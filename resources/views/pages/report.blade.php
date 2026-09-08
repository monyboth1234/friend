<!DOCTYPE html>
<html lang="km">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>របាយការណ៍មតិកោល និងការមេត្តី (Customer Review Report)</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Kantumruy+Pro:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Kantumruy Pro', sans-serif; background-color: #f4f6f9; }
        .sidebar { position: fixed; top: 0; bottom: 0; left: 0; width: 260px; height: 100vh; background-color: #198754; z-index: 1000; overflow-y: auto; box-shadow: 4px 0 10px rgba(0,0,0,0.05); transition: all 0.3s ease; }
        .main-content { margin-left: 260px; min-height: 100vh; padding: 1.5rem; }
        @media (max-width: 767.98px) { .sidebar { position: relative; width: 100%; height: auto; } .main-content { margin-left: 0; } }
        .sidebar .nav-link { color: rgba(255,255,255,0.85); padding: 0.75rem 1rem; border-radius: 0.5rem; margin-bottom: 0.25rem; transition: all 0.2s ease-in-out; font-weight: 500; }
        .sidebar .nav-link:hover { color: #fff; background-color: rgba(255,255,255,0.15); transform: translateX(3px); }
        .sidebar .nav-link.active { color: #198754 !important; background-color: #ffffff !important; box-shadow: 0 4px 6px rgba(0,0,0,0.1); }
        .sidebar .sub-nav-link { color: rgba(255,255,255,0.75); font-size: 0.9rem; padding: 0.5rem 1rem; border-radius: 0.375rem; transition: all 0.2s; }
        .sidebar .sub-nav-link:hover { color: #fff; background-color: rgba(255,255,255,0.1); }
        .stat-card { transition: transform 0.2s ease, box-shadow 0.2s ease; }
        .stat-card:hover { transform: translateY(-4px); box-shadow: 0 10px 20px rgba(0,0,0,0.08) !important; }
        .review-card { border: 1px solid #eaeaea; border-radius: 14px; transition: 0.2s; }
        .review-card:hover { box-shadow: 0 5px 18px rgba(0,0,0,0.07); }
        .avatar { width: 48px; height: 48px; min-width: 48px; border-radius: 50%; background: #198754; color: white; display: flex; align-items: center; justify-content: center; font-weight: bold; font-size: 18px; }
        .product-name { color: #198754; font-weight: 600; }
    </style>
</head>
<body>