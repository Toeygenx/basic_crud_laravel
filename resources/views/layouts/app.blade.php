<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CRUD Laravel</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --bg-dark: #0a0a0c;
            --accent-neon: #10b981;
            --accent-neon-hover: #059669;
            --glass-bg: rgba(255, 255, 255, 0.03);
            --glass-border: rgba(255, 255, 255, 0.08);
            --glass-glow: rgba(16, 185, 129, 0.15);
        }
        
        body {
            background-color: var(--bg-dark) !important;
            color: #f8fafc;
            font-family: 'Plus Jakarta Sans', sans-serif;
            min-height: 100vh;
            position: relative;
            overflow-x: hidden;
        }

        h1, h2, h3, h4, h5, h6 {
            font-family: 'Outfit', sans-serif;
            font-weight: 600;
            letter-spacing: -0.02em;
        }

        /* Ambient Background Orbs */
        .ambient-orb {
            position: fixed;
            border-radius: 50%;
            filter: blur(100px);
            z-index: -1;
            opacity: 0.4;
            animation: float 20s infinite alternate ease-in-out;
            pointer-events: none;
        }
        .orb-1 {
            width: 40vw; height: 40vw;
            background: radial-gradient(circle, rgba(16,185,129,0.2) 0%, rgba(0,0,0,0) 70%);
            top: -10%; left: -10%;
        }
        .orb-2 {
            width: 35vw; height: 35vw;
            background: radial-gradient(circle, rgba(14,165,233,0.15) 0%, rgba(0,0,0,0) 70%);
            bottom: -5%; right: -5%;
            animation-delay: -5s;
        }

        @keyframes float {
            0% { transform: translate(0, 0) scale(1); }
            100% { transform: translate(30px, 50px) scale(1.1); }
        }

        /* Glass Cards */
        .glass-card {
            background: var(--glass-bg);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid var(--glass-border);
            border-radius: 16px;
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
            transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
            overflow: hidden;
        }
        
        .glass-card:hover {
            transform: translateY(-5px);
            border-color: rgba(16, 185, 129, 0.3);
            box-shadow: 0 10px 40px var(--glass-glow);
        }

        /* Form Elements */
        .form-control {
            background: rgba(255, 255, 255, 0.05) !important;
            border: 1px solid var(--glass-border) !important;
            color: #fff !important;
            border-radius: 12px;
            padding: 0.75rem 1rem;
            transition: all 0.3s ease;
        }
        .form-control:focus {
            background: rgba(255, 255, 255, 0.08) !important;
            border-color: var(--accent-neon) !important;
            box-shadow: 0 0 0 4px rgba(16, 185, 129, 0.1) !important;
        }
        .form-label {
            font-weight: 500;
            color: #cbd5e1;
            margin-bottom: 0.5rem;
        }

        /* Buttons */
        .btn-glass {
            border-radius: 10px;
            padding: 0.6rem 1.5rem;
            font-weight: 500;
            font-family: 'Outfit', sans-serif;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            border: 1px solid transparent;
            text-decoration: none;
            display: inline-block;
            text-align: center;
        }
        
        .btn-primary-neon {
            background: linear-gradient(135deg, var(--accent-neon), #059669);
            color: white;
            border: none;
            box-shadow: 0 4px 15px rgba(16, 185, 129, 0.3);
        }
        .btn-primary-neon:hover {
            background: linear-gradient(135deg, #34d399, var(--accent-neon));
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(16, 185, 129, 0.5);
            color: white;
        }

        .btn-danger-neon {
            background: transparent;
            color: #f43f5e;
            border: 1px solid rgba(244, 63, 94, 0.3);
        }
        .btn-danger-neon:hover {
            background: rgba(244, 63, 94, 0.1);
            border-color: #f43f5e;
            color: #f43f5e;
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(244, 63, 94, 0.2);
        }
        
        .btn-secondary-glass {
            background: rgba(255, 255, 255, 0.05);
            color: #cbd5e1;
            border: 1px solid var(--glass-border);
        }
        .btn-secondary-glass:hover {
            background: rgba(255, 255, 255, 0.1);
            color: #fff;
            transform: translateY(-2px);
        }

        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }
        ::-webkit-scrollbar-track {
            background: var(--bg-dark);
        }
        ::-webkit-scrollbar-thumb {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 4px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: rgba(255, 255, 255, 0.2);
        }
        /* Custom Pagination */
        .pagination {
            gap: 0.5rem;
        }
        .page-item .page-link {
            background: var(--glass-bg);
            border: 1px solid var(--glass-border);
            color: #cbd5e1;
            border-radius: 8px;
            padding: 0.5rem 1rem;
            transition: all 0.3s ease;
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
        }
        .page-item .page-link:hover {
            background: rgba(255, 255, 255, 0.1);
            color: #fff;
            border-color: rgba(16, 185, 129, 0.3);
            transform: translateY(-2px);
        }
        .page-item.active .page-link {
            background: linear-gradient(135deg, var(--accent-neon), #059669);
            color: white;
            border-color: transparent;
            box-shadow: 0 4px 15px rgba(16, 185, 129, 0.3);
        }
        .page-item.disabled .page-link {
            background: rgba(255, 255, 255, 0.01);
            color: #475569;
            border-color: rgba(255, 255, 255, 0.03);
            pointer-events: none;
        }
    </style>
</head>
<body>
    <div class="ambient-orb orb-1"></div>
    <div class="ambient-orb orb-2"></div>

    <!-- main container -->
    <div class="container py-5 position-relative" style="z-index: 1;">
        @yield('content')
    </div>
    
</body>
</html>
