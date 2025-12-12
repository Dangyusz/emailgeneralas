<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Aláírás Generálása - {{ config('app.name', 'AILFRAME') }}</title>

        <link rel="icon" href="/favicon.ico" sizes="any">
        <link rel="icon" href="/favicon.svg" type="image/svg+xml">
        <link rel="apple-touch-icon" href="/apple-touch-icon.png">

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700,800" rel="stylesheet" />
        <link rel="stylesheet" href="https://use.typekit.net/lrw3vdh.css">

        {{-- Preload footer background --}}
        <link rel="preload" as="image" href="https://cdn.hexaverse.hu/erasmus6.webp">

        <style>
            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }

            .page-wrapper {
                background-color: #F1F9FF;
                min-height: 100vh;
                font-family: 'Inter', sans-serif;
                display: flex;
                flex-direction: column;
            }

            .main-content {
                flex: 1;
                padding: 0 24px 0 0;
                width: 100%;
                display: flex;
                gap: 0;
            }

            /* Sidebar Panel */
            .sidebar-panel {
                width: 320px;
                min-width: 200px;
                max-width: 50vw;
                flex-shrink: 0;
                background-color: #E3EEF6;
                padding: 20px;
                border-radius: 0 12px 12px 0;
                position: relative;
                overflow-y: auto;
                height: calc(100vh - 0px);
                /* scrollbar elrejtése */
                scrollbar-width: none; /* Firefox */
            }
            .sidebar-panel::-webkit-scrollbar {
                display: none; /* Chrome, Safari */
            }

            /* Resize Handle */
            .resize-handle {
                position: absolute;
                top: 0;
                right: -5px;
                width: 10px;
                height: 100%;
                cursor: ew-resize;
                background: transparent;
                z-index: 10;
            }

            .resize-handle:hover,
            .resize-handle.active {
                background: linear-gradient(to right, transparent, rgba(50, 39, 153, 0.2), transparent);
            }

            .resize-handle::after {
                content: '';
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                width: 4px;
                height: 40px;
                background: #322799;
                border-radius: 2px;
                opacity: 0;
                transition: opacity 0.2s;
            }

            .resize-handle:hover::after,
            .resize-handle.active::after {
                opacity: 0.5;
            }

            .sidebar-section-title {
                font-size: 24px;
                font-weight: 700;
                color: #1a1a1a;
                margin-bottom: 16px;
            }

            .sidebar-form {
                display: flex;
                flex-direction: column;
                gap: 12px;
            }

            .sidebar-input {
                width: 100%;
                padding: 14px 16px;
                border: 1px solid #e0e0e0;
                border-radius: 8px;
                font-size: 14px;
                font-family: 'Inter', sans-serif;
                background: white;
                transition: border-color 0.2s, box-shadow 0.2s;
            }

            .sidebar-input:focus {
                outline: none;
                border-color: #322799;
                box-shadow: 0 0 0 3px rgba(50, 39, 153, 0.1);
            }

            .sidebar-input::placeholder {
                color: #999;
            }

            .templates-section {
                margin-top: 24px;
            }

            .templates-grid {
                display: flex;
                flex-direction: column;
                gap: 12px;
                margin-top: 12px;
            }

            .template-card {
                position: relative;
                width: 100%;
                height: 90px;
                background: white;
                border-radius: 12px;
                display: flex;
                align-items: center;
                justify-content: center;
                cursor: pointer;
                box-shadow: 0 2px 8px rgba(0, 0, 0, 0.06);
                transition: transform 0.2s, box-shadow 0.2s;
                border: 2px solid transparent;
                flex-shrink: 0;
            }

            .template-card:hover {
                transform: translateY(-2px);
                box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            }

            .template-card.selected {
                border-color: #322799;
            }

            .template-card input[type="radio"] {
                position: absolute;
                top: 8px;
                right: 8px;
                width: 16px;
                height: 16px;
                accent-color: #322799;
            }

            .template-number {
                font-size: 42px;
                font-weight: 800;
                color: #1a1a1a;
            }

            .copy-button {
                width: 100%;
                margin-top: 24px;
                padding: 16px;
                background: #322799;
                color: white;
                border: none;
                border-radius: 8px;
                font-size: 16px;
                font-weight: 600;
                font-family: 'Inter', sans-serif;
                cursor: pointer;
                transition: background-color 0.2s, transform 0.2s;
            }

            .copy-button:hover {
                background: #271f7a;
            }

            .copy-button:active {
                transform: scale(0.98);
            }

            /* Preview Area */
            .preview-area {
                flex: 1;
                padding-left: 40px;
                display: flex;
                flex-direction: column;
                align-items: center;
            }

            .page-title {
                font-size: 32px;
                font-weight: 700;
                color: #322799;
                margin-bottom: 24px;
            }

            .content-placeholder {
                background: white;
                border-radius: 12px;
                padding: 40px;
                box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
                min-height: 400px;
            }

            .content-placeholder p {
                color: #666;
                font-size: 16px;
            }

            /* Template-specific styles moved into each template file (.tpl-1 .. .tpl-10) */
            /* This keeps template styles isolated and avoids class collisions. */
            .copy-html-btn {
                display: block;
                width: 100%;
                max-width: 900px;
                margin: 0 auto 24px auto;
                padding: 16px;
                background: #8d3c8f;
                color: #fff;
                border: none;
                border-radius: 8px;
                font-size: 18px;
                font-weight: 600;
                cursor: pointer;
                transition: background 0.2s;
            }
            .copy-html-btn:hover {
                background: #c77fdc;
            }

            .usage-guide {
                max-width: 900px;
                margin: 0 auto 16px auto;
                padding: 12px;
                background: #fff3cd;
                border-radius: 8px;
                font-size: 14px;
                color: #333;
            }

            @media (max-width: 768px) {
                .main-content {
                    flex-direction: column;
                    padding: 16px;
                }
                
                .sidebar-panel {
                    width: 100%;
                    border-radius: 12px;
                }
            }
        </style>
    </head>
    <body>
        <div class="page-wrapper">
            @include('components.navbar')
            
            <main class="main-content">
                <!-- Sidebar Panel -->
                <aside class="sidebar-panel" id="sidebarPanel">
                    <div class="resize-handle" id="resizeHandle"></div>
                    <h2 class="sidebar-section-title">Adatok</h2>
                    <form class="sidebar-form" id="signatureForm">
                        <input type="text" class="sidebar-input" name="name" placeholder="Név">
                        <input type="email" class="sidebar-input" name="email" placeholder="Email cím">
                        <input type="text" class="sidebar-input" name="company" placeholder="Cégnév">
                        <input type="text" class="sidebar-input" name="position" placeholder="Beosztás">
                        <input type="url" class="sidebar-input" name="website" placeholder="Webcím">
                        <input type="url" class="sidebar-input" name="image_url" placeholder="Kép URL">
                    </form>

                    <div class="templates-section">
                        <h2 class="sidebar-section-title">Sablonok</h2>
                        <div class="templates-grid">
                            <label class="template-card">
                                <input type="radio" name="template" value="1">
                                <span class="template-number">1</span>
                            </label>
                            <label class="template-card selected">
                                <input type="radio" name="template" value="2" checked>
                                <span class="template-number">2</span>
                            </label>
                            <label class="template-card">
                                <input type="radio" name="template" value="3">
                                <span class="template-number">3</span>
                            </label>
                            <label class="template-card">
                                <input type="radio" name="template" value="4">
                                <span class="template-number">4</span>
                            </label>
                            <label class="template-card">
                                <input type="radio" name="template" value="5">
                                <span class="template-number">5</span>
                            </label>
                            <label class="template-card">
                                <input type="radio" name="template" value="6">
                                <span class="template-number">6</span>
                            </label>
                            <label class="template-card">
                                <input type="radio" name="template" value="7">
                                <span class="template-number">7</span>
                            </label>
                            <label class="template-card">
                                <input type="radio" name="template" value="8">
                                <span class="template-number">8</span>
                            </label>
                            <label class="template-card">
                                <input type="radio" name="template" value="9">
                                <span class="template-number">9</span>
                            </label>
                            <label class="template-card">
                                <input type="radio" name="template" value="10">
                                <span class="template-number">10</span>
                            </label>
                        </div>
                    </div>

                    <button type="button" class="copy-button" id="copyHtmlBtn">Másolás</button>
                </aside>

                <!-- Preview Area -->
                <div class="preview-area">
                    <div id="signatureCard"></div>
                </div>
            </main>

            <!-- Hidden template store (Blade includes rendered as text/html) -->
            <div style="display:none;">
                <script type="text/html" id="template-1">@include('templates.template1')</script>
                <script type="text/html" id="template-2">@include('templates.template2')</script>
                <script type="text/html" id="template-3">@include('templates.template3')</script>
                <script type="text/html" id="template-4">@include('templates.template4')</script>
                <script type="text/html" id="template-5">@include('templates.template5')</script>
                <script type="text/html" id="template-6">@include('templates.template6')</script>
                <script type="text/html" id="template-7">@include('templates.template7')</script>
                <script type="text/html" id="template-8">@include('templates.template8')</script>
                <script type="text/html" id="template-9">@include('templates.template9')</script>
                <script type="text/html" id="template-10">@include('templates.template10')</script>
            </div>

            @include('components.footer')
        </div>

        <script>
            // Sidebar resize functionality
            (function() {
                const sidebar = document.getElementById('sidebarPanel');
                const resizeHandle = document.getElementById('resizeHandle');
                let isResizing = false;
                let startX, startWidth;

                resizeHandle.addEventListener('mousedown', function(e) {
                    isResizing = true;
                    startX = e.clientX;
                    startWidth = sidebar.offsetWidth;
                    resizeHandle.classList.add('active');
                    document.body.style.cursor = 'ew-resize';
                    document.body.style.userSelect = 'none';
                    e.preventDefault();
                });

                document.addEventListener('mousemove', function(e) {
                    if (!isResizing) return;
                    
                    const diff = e.clientX - startX;
                    let newWidth = startWidth + diff;
                    
                    // Min 200px, max 50% of viewport
                    const minWidth = 200;
                    const maxWidth = window.innerWidth / 2;
                    
                    newWidth = Math.max(minWidth, Math.min(maxWidth, newWidth));
                    sidebar.style.width = newWidth + 'px';
                });

                document.addEventListener('mouseup', function() {
                    if (isResizing) {
                        isResizing = false;
                        resizeHandle.classList.remove('active');
                        document.body.style.cursor = '';
                        document.body.style.userSelect = '';
                    }
                });

                // Handle window resize to enforce max-width constraint
                window.addEventListener('resize', function() {
                    const maxWidth = window.innerWidth / 2;
                    if (sidebar.offsetWidth > maxWidth) {
                        sidebar.style.width = maxWidth + 'px';
                    }
                });
            })();

            // Template selection handling: load template HTML from hidden store and render
            function getTemplateHtml(id) {
                const el = document.getElementById('template-' + id);
                return el ? el.innerHTML : '';
            }

            function renderTemplateToPreview(id) {
                const tpl = getTemplateHtml(id);
                if (!tpl) return;

                const name = (document.querySelector('[name="name"]') || {}).value || 'Miauuu mia';
                const email = (document.querySelector('[name="email"]') || {}).value || 'elek@dino.frame';
                const position = (document.querySelector('[name="position"]') || {}).value || 'rózsaszín & nyávogó';
                const company = (document.querySelector('[name="company"]') || {}).value || 'MAILFRAME';
                const websiteVal = (document.querySelector('[name="website"]') || {}).value || 'https://mailframe.hu';
                const websiteHref = websiteVal.startsWith('http') ? websiteVal : ('https://' + websiteVal);
                const websiteText = (document.querySelector('[name="website"]') || {}).value || 'MailFrame.hu';
                const img = (document.querySelector('[name="image_url"]') || {}).value || 'https://cdn.hexaverse.hu/cica.png';

                let html = tpl.replace(/__TITLE__/g, escapeHtml(name))
                              .replace(/__EMAIL__/g, escapeHtml(email))
                              .replace(/__POSITION__/g, escapeHtml(position))
                              .replace(/__COMPANY__/g, escapeHtml(company))
                              .replace(/__WEBSITE_HREF__/g, escapeHtml(websiteHref))
                              .replace(/__WEBSITE_TEXT__/g, escapeHtml(websiteText))
                              .replace(/__IMG__/g, escapeHtml(img));

                const preview = document.getElementById('signatureCard');
                if (preview) {
                    preview.innerHTML = html;

                    // ensure copy icon/button exists and is bound
                    let copyIcon = document.getElementById('copyCardIcon');
                    if (!copyIcon) {
                        copyIcon = document.createElement('span');
                        copyIcon.className = 'copy-icon';
                        copyIcon.id = 'copyCardIcon';
                        copyIcon.title = 'HTML kód másolása';
                        copyIcon.innerHTML = `<!-- copy svg -->\n<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="none" stroke="#b3b3e6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-copy"><rect width="14" height="14" x="8" y="8" rx="2"/><path d="M16 8V6a2 2 0 0 0-2-2H6a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h2"/></svg>`;
                        preview.appendChild(copyIcon);
                        copyIcon.addEventListener('click', copySignatureHtml);
                    } else {
                        // reattach if necessary
                        if (!preview.contains(copyIcon)) preview.appendChild(copyIcon);
                        copyIcon.onclick = copySignatureHtml;
                    }
                }
            }

            document.querySelectorAll('.template-card').forEach(card => {
                card.addEventListener('click', function() {
                    document.querySelectorAll('.template-card').forEach(c => c.classList.remove('selected'));
                    this.classList.add('selected');
                    const val = this.querySelector('input[name="template"]')?.value;
                    if (val) renderTemplateToPreview(val);
                });
            });

            // Copy button functionality (uses same copy as HTML copy)
            (function() {
                const leftBtn = document.getElementById('copyButton') || document.getElementById('copyHtmlBtn');
                if (!leftBtn) return;
                leftBtn.addEventListener('click', function() {
                    if (typeof copySignatureHtml === 'function') {
                        copySignatureHtml();
                    } else {
                        alert('Másolás funkció jelenleg nem érhető el.');
                    }
                });
            })();

                        // HTML kód másolása gomb
                        function escapeHtml(str) {
                            return String(str)
                                .replace(/&/g, '&amp;')
                                .replace(/</g, '&lt;')
                                .replace(/>/g, '&gt;')
                                .replace(/"/g, '&quot;')
                                .replace(/'/g, '&#39;');
                        }

                        function buildSignatureHtml() {
                            const title = (document.getElementById('cardTitle') || {}).textContent || '';
                            const email = (document.getElementById('cardEmail') || {}).textContent || '';
                            const position = (document.getElementById('cardPosition') || {}).textContent || '';
                            const company = (document.getElementById('cardLogo') || {}).textContent || 'MAILFRAME';
                            const websiteEl = document.getElementById('cardWebsite');
                            const websiteHref = websiteEl ? (websiteEl.href || '') : '';
                            const websiteText = websiteEl ? (websiteEl.textContent || websiteHref) : websiteHref;
                            const img = (document.getElementById('cardImage') || {}).src || '';

                            const html = `
            <div style="font-family: Inter, Arial, sans-serif; max-width: 1000px; margin: 40px auto; position: relative;">
                <table cellpadding="0" cellspacing="0" border="0" style="background: #ffffff url('https://cdn.hexaverse.hu/Group%202620.svg') right center / auto 185% no-repeat; border-radius: 20px; padding: 32px; border: 3px solid #c77fdc; width: 100%;">
                <tr>
                    <td style="vertical-align: top; width: 200px; text-align: center; padding-right: 32px;">
                        <img src="${escapeHtml(img)}" width="180" height="180" alt="Profile" style="display: block; margin: 0 auto 16px; border-radius: 20px; border: 4px solid #ffffff; object-fit: cover;" />
                        <div style="font-family: serif; font-size: 32px; font-style: italic; letter-spacing: 2px; margin-top: 12px; color: #333;">${escapeHtml(company)}</div>
                    </td>
                    <td style="vertical-align: top;">
                        <table cellpadding="0" cellspacing="0" border="0" style="width: 100%; border-bottom: 3px solid #ae2f94; padding-bottom: 8px; margin-bottom: 16px;">
                        <tr>
                            <td style="vertical-align: top;">
                                <div style="font-family: 'ivypresto-display', Georgia, serif; font-size: 40px; color: #99007A; font-weight: 600; line-height: 1.2;">${escapeHtml(title)}</div>
                            </td>
                        </tr>
                        </table>
                        <div style="font-size: 18px; color: #d5a3e0; line-height: 1.8;">
                            <strong style="color: #333;">Email cím:</strong> <a href="mailto:${escapeHtml(email)}" style="color: #d5a3e0; text-decoration: underline;">${escapeHtml(email)}</a><br />
                            <strong style="color: #333;">Beosztás:</strong> <span style="color: #d5a3e0;">${escapeHtml(position)}</span><br />
                            <strong style="color: #333;">Weboldal:</strong> <a href="${escapeHtml(websiteHref)}" style="color: #8d8df5; text-decoration: underline; display: inline-block; margin-top: 4px;">${escapeHtml(websiteText)}</a>
                        </div>
                    </td>
                </tr>
                </table>
            </div>`;

                            return html;
                        }

                        function copyViaContentEditable(html) {
                            return new Promise((resolve, reject) => {
                                const container = document.createElement('div');
                                container.style.position = 'fixed';
                                container.style.left = '-9999px';
                                container.contentEditable = 'true';
                                container.innerHTML = html;
                                document.body.appendChild(container);

                                const range = document.createRange();
                                range.selectNodeContents(container);
                                const selection = window.getSelection();
                                selection.removeAllRanges();
                                selection.addRange(range);

                                try {
                                    const ok = document.execCommand('copy');
                                    document.body.removeChild(container);
                                    selection.removeAllRanges();
                                    if (ok) resolve(); else reject(new Error('execCommand returned false'));
                                } catch (err) {
                                    try { document.body.removeChild(container); } catch(e){}
                                    try { selection.removeAllRanges(); } catch(e){}
                                    reject(err);
                                }
                            });
                        }

                        async function copySignatureHtml() {
                            const html = buildSignatureHtml();
                            const btn = document.getElementById('copyHtmlBtn');

                            const showCopied = () => {
                                if (!btn) return;
                                const old = btn.textContent;
                                btn.textContent = 'Kimásolva!';
                                setTimeout(() => btn.textContent = old, 1500);
                            };

                            try {
                                if (navigator.clipboard && window.ClipboardItem) {
                                    const type = 'text/html';
                                    const blob = new Blob([html], { type });
                                    const data = [ new ClipboardItem({ [type]: blob }) ];
                                    await navigator.clipboard.write(data);
                                    showCopied();
                                    return;
                                }

                                // If there's a .signature-card element in the preview, prefer copying its outerHTML
                                try {
                                    const preview = document.getElementById('signatureCard');
                                    if (preview) {
                                        const domSig = preview.querySelector('.signature-card');
                                        const toCopy = domSig ? domSig.outerHTML : html;
                                        const type2 = 'text/html';
                                        if (navigator.clipboard && window.ClipboardItem) {
                                            const blob2 = new Blob([toCopy], { type: type2 });
                                            await navigator.clipboard.write([ new ClipboardItem({ [type2]: blob2 }) ]);
                                            showCopied();
                                            return;
                                        }
                                        // fallback to contentEditable using the DOM HTML
                                        await copyViaContentEditable(toCopy);
                                        showCopied();
                                        return;
                                    }
                                } catch(e) {
                                    console.warn('DOM copy attempt failed, falling back', e);
                                }

                                // Fallback to contentEditable selection copy with generated html
                                await copyViaContentEditable(html);
                                showCopied();
                                return;
                            } catch (err) {
                                console.error('HTML másolás sikertelen, fallback szövegre:', err);
                                try {
                                    await navigator.clipboard.writeText(html);
                                    alert('HTML kód kimásolva szövegként. Használd a böngésző beépített "Beillesztés formázással" funkcióját.');
                                    showCopied();
                                } catch (err2) {
                                    alert('Másolás sikertelen: ' + (err2?.message || err2));
                                }
                            }
                        }

                    document.getElementById('copyHtmlBtn').addEventListener('click', copySignatureHtml);

            // Update preview from form inputs (lookup elements dynamically so template injection works)
            (function() {
                const nameInput = document.querySelector('[name="name"]');
                const emailInput = document.querySelector('[name="email"]');
                const positionInput = document.querySelector('[name="position"]');
                const companyInput = document.querySelector('[name="company"]');
                const websiteInput = document.querySelector('[name="website"]');
                const imageInput = document.querySelector('[name="image_url"]');

                function updatePreview() {
                    const cardTitle = document.getElementById('cardTitle');
                    const cardEmail = document.getElementById('cardEmail');
                    const cardPosition = document.getElementById('cardPosition');
                    const cardLogo = document.getElementById('cardLogo');
                    const cardWebsite = document.getElementById('cardWebsite');
                    const cardImage = document.getElementById('cardImage');

                    if (nameInput && cardTitle) cardTitle.textContent = nameInput.value || 'Miauuu mia';
                    if (emailInput && cardEmail) {
                        cardEmail.textContent = emailInput.value || 'elek@dino.frame';
                        try { cardEmail.href = 'mailto:' + (emailInput.value || 'elek@dino.frame'); } catch(e){}
                    }
                    if (positionInput && cardPosition) cardPosition.textContent = positionInput.value || 'rózsaszín & nyávogó';
                    if (companyInput && cardLogo) cardLogo.textContent = companyInput.value || 'MAILFRAME';
                    if (websiteInput && cardWebsite) {
                        const v = websiteInput.value || 'https://mailframe.hu';
                        try { cardWebsite.href = v.startsWith('http') ? v : ('https://' + v); } catch(e) {}
                        cardWebsite.textContent = websiteInput.value || 'MailFrame.hu';
                    }
                    if (imageInput && cardImage) {
                        if (imageInput.value) cardImage.src = imageInput.value;
                    }
                }

                [nameInput, emailInput, positionInput, companyInput, websiteInput, imageInput].forEach(inp => {
                    if (!inp) return;
                    inp.addEventListener('input', updatePreview);
                });

                // initial sync and render selected template
                const checked = document.querySelector('input[name="template"]:checked');
                if (checked) {
                    // ensure the selected card gets visual state
                    document.querySelectorAll('.template-card').forEach(c => c.classList.remove('selected'));
                    const parent = checked.closest('.template-card');
                    if (parent) parent.classList.add('selected');
                    renderTemplateToPreview(checked.value);
                } else {
                    updatePreview();
                }
            })();
        </script>
    </body>
</html>
