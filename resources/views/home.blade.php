<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - {{ config('app.name', 'MAILFRAME') }}</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700,800" rel="stylesheet" />
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: #F1F9FF;
            padding: 40px 20px;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
        }

        h1 {
            color: #322799;
            font-size: 32px;
            font-weight: 700;
            margin-bottom: 20px;
        }

        .success-message {
            background-color: #d4edda;
            color: #155724;
            padding: 12px 20px;
            border-radius: 8px;
            margin-bottom: 20px;
            border: 1px solid #c3e6cb;
        }

        .users-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
            margin-top: 20px;
        }

        .user-card {
            background: white;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .user-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.12);
        }

        .user-name {
            font-size: 18px;
            font-weight: 600;
            color: #322799;
            margin-bottom: 8px;
        }

        .user-email {
            font-size: 14px;
            color: #666;
            margin-bottom: 12px;
        }

        .user-details {
            font-size: 13px;
            color: #888;
            line-height: 1.6;
        }

        .user-details strong {
            color: #555;
        }

        .nav-links {
            margin-bottom: 30px;
            display: flex;
            gap: 15px;
        }

        .nav-links a {
            padding: 10px 20px;
            background-color: #322799;
            color: white;
            text-decoration: none;
            border-radius: 8px;
            font-weight: 500;
            transition: background-color 0.2s;
        }

        .nav-links a:hover {
            background-color: #271f7a;
        }

        .no-users {
            text-align: center;
            padding: 40px;
            color: #666;
            font-size: 16px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="nav-links">
            <a href="/">Welcome Page</a>
            <a href="/login">Login</a>
            <a href="/register">Register</a>
        </div>

        <h1>Users in System</h1>

        @if(session('success'))
            <div class="success-message">
                {{ session('success') }}
            </div>
        @endif

        @if($users->count() > 0)
            <div class="users-grid">
                @foreach ($users as $user)
                    <div class="user-card">
                        <div class="user-name">{{ $user->name }}</div>
                        <div class="user-email">{{ $user->email }}</div>
                        <div class="user-details">
                            @if($user->c_name)
                                <div><strong>Company:</strong> {{ $user->c_name }}</div>
                            @endif
                            @if($user->job_title)
                                <div><strong>Job Title:</strong> {{ $user->job_title }}</div>
                            @endif
                            @if($user->tell)
                                <div><strong>Phone:</strong> {{ $user->tell }}</div>
                            @endif
                            <div><strong>Member since:</strong> {{ $user->created_at->format('M d, Y') }}</div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="no-users">
                No users found in the system.
            </div>
        @endif
    </div>
</body>

</html>