<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            flex-direction: column;
            text-align: center;
        }

        .container {
            width: 90%;
            max-width: 500px;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
        }

        .header {
            margin-bottom: 15px;
        }

        .header h1 {
            font-size: 24px;
            color: #333;
        }

        .logout-btn {
            background: #d9534f;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 10px;
        }

        .logout-btn:hover {
            background: #c9302c;
        }

        @media (max-width: 768px) {
            .container {
                width: 95%;
                padding: 15px;
            }
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="header">
            <h1>Welcome, {{ Auth::user()->name ?? 'Guest' }}</h1>
            <p>{{ Auth::user()->full_name }}</p>
        </div>
        <p>Renzloy Gwapo Et Al.</p>
        <p class="info">Authentication Method: 
            <strong>
            <p><strong>Logged in using: {{ Auth::user()->auth_method ?? 'traditional' }}</strong></p>
            </strong>
        </p>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="logout-btn">Logout</button>
        </form>
    </div>

</body>
</html>
