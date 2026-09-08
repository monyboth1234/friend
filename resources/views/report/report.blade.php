<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Customer Review Report</title>

    <!-- Bootstrap 5 -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <!-- Font Awesome -->
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ ajax/libs/font-awesome/6.7.2/css/all.min.css"
    >

    <style>
        body {
            background: #f5f7fb;
            font-family: Arial, sans-serif;
        }

        .page-title {
            font-weight: 700;
        }

        .stat-card {
            border: none;
            border-radius: 16px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.06);
        }

        .stat-icon {
            width: 55px;
            height: 55px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 23px;
        }

        .rating-number {
            font-size: 48px;
            font-weight: 700;
            line-height: 1;
        }

        .stars {
            color: #ffc107;
            letter-spacing: 2px;
        }

        .progress {
            height: 9px;
            border-radius: 10px;
            background: #e9ecef;
        }

        .progress-bar {
            border-radius: 10px;
        }

        .review-card {
            border: 1px solid #eee;
            border-radius: 14px;
            transition: 0.2s;
        }

        .review-card:hover {
            box-shadow: 0 5px 18px rgba(0, 0, 0, 0.07);
        }

        .avatar {
            width: 48px;
            height: 48px;
            min-width: 48px;
            border-radius: 50%;
            background: #198754;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            font-size: 18px;
        }

        .product-name {
            color: #198754;
            font-weight: 600;
        }

        .filter-box {
            border-radius: 10px;
        }

        .summary-box {
            background: #fff;
            border-radius: 16px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.06);
        }
    </style>
</head>

<body>

<div class="container-fluid p-4">

    <!-- ================= HEADER ================= -->
    <div class="d-flex flex-wrap justify-content-between align-items-center mb-4">

        <div>
            <h2 class="page-title mb-1">
                Customer Review Report
            </h2>

            <p class="text-muted mb-0">
                Monitor customer ratings and feedback
            </p>
        </div>

        <div class="d-flex gap-2 mt-3 mt-md-0">

            <button class="btn btn-outline-secondary">
                <i class="fa-solid fa-filter me-1"></i>
                Filter
            </button>

            <button class="btn btn-dark">
                <i class="fa-solid fa-print me-1"></i>
                Print Report
            </button>

        </div>

    </div>


    <!-- ================= STATISTICS ================= -->
    <div class="row g-4 mb-4">

        <!-- Average Rating -->
        <div class="col-xl-4 col-md-6">

            <div class="card stat-card h-100">

                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-start">

                        <div>
                            <p class="text-muted mb-2">
                                Average Rating
                            </p>

                            <div class="rating-number">
                                {{ number_format($averageRating, 1) }}
                            </div>

                            <div class="stars mt-2">
                                @for($i = 1; $i <= 5; $i++)
                                    <i class="fa-solid fa-star @if($i <= floor($averageRating)) text-warning @elseif($i - 0.5 <= $averageRating) text-warning-half @else text-secondary @endif"></i>
                                @endfor
                            </div>

                            <small class="text-muted">
                                Based on {{ $reviews->count() }} reviews
                            </small>
                        </div>

                        <div class="stat-icon bg-warning-subtle text-warning">
                            <i class="fa-solid fa-star"></i>
                        </div>

                    </div>

                </div>

            </div>

        </div>


        <!-- Total Reviews -->
        <div class="col-xl-4 col-md-6">

            <div class="card stat-card h-100">

                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-start">

                        <div>

                            <p class="text-muted mb-2">
                                Total Reviews
                            </p>

                            <h2 class="fw-bold mb-2">
                                {{ $reviews->count() }}
                            </h2>

                            <span class="text-success">
                                <i class="fa-solid fa-arrow-up"></i>
                                12.5%
                            </span>

                            <small class="text-muted">
                                this month
                            </small>

                        </div>

                        <div class="stat-icon bg-primary-subtle text-primary">
                            <i class="fa-solid fa-comments"></i>
                        </div>

                    </div>

                </div>

            </div>

        </div>


        <!-- Positive Reviews -->
        <div class="col-xl-4 col-md-12">

            <div class="card stat-card h-100">

                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-start">

                        <div>

                            <p class="text-muted mb-2">
                                Positive Reviews
                            </p>

                            <h2 class="fw-bold mb-2">
                                {{ $starCounts[5] + $starCounts[4] }}
                            </h2>

                            <span class="text-success">
                                {{ $total > 0 ? number_format(($starCounts[5] + $starCounts[4]) / $total * 100, 1) : 0 }}%
                            </span>

                            <small class="text-muted">
                                of total reviews
                            </small>

                        </div>

                        <div class="stat-icon bg-success-subtle text-success">
                            <i class="fa-solid fa-thumbs-up"></i>
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>


    <!-- ================= RATING DISTRIBUTION ================= -->
    <div class="row g-4 mb-4">

        <div class="col-lg-5">

            <div class="summary-box p-4 h-100">

                <h5 class="fw-bold mb-4">
                    Rating Distribution
                </h5>


                <!-- 5 Star -->
                <div class="d-flex align-items-center mb-3">

                    <div style="width:70px;">
                        5 <i class="fa-solid fa-star text-warning"></i>
                    </div>

                    <div class="flex-grow-1 mx-2">

                        <div class="progress">

                            <div
                                class="progress-bar bg-success"
                                style="width: {{ $total > 0 ? number_format($starCounts[5] / $total * 100, 1) : 0 }}%;">
                            </div>

                        </div>

                    </div>

                    <div style="width:45px;" class="text-end">
                        {{ $starCounts[5] }}
                    </div>

                </div>


                <!-- 4 Star -->
                <div class="d-flex align-items-center mb-3">

                    <div style="width:70px;">
                        4 <i class="fa-solid fa-star text-warning"></i>
                    </div>

                    <div class="flex-grow-1 mx-2">

                        <div class="progress">

                            <div
                                class="progress-bar bg-info"
                                style="width: {{ $total > 0 ? number_format($starCounts[4] / $total * 100, 1) : 0 }}%;">
                            </div>

                        </div>

                    </div>

                    <div style="width:45px;" class="text-end">
                        {{ $starCounts[4] }}
                    </div>

                </div>


                <!-- 3 Star -->
                <div class="d-flex align-items-center mb-3">

                    <div style="width:70px;">
                        3 <i class="fa-solid fa-star text-warning"></i>
                    </div>

                    <div class="flex-grow-1 mx-2">

                        <div class="progress">

                            <div
                                class="progress-bar bg-warning"
                                style="width: {{ $total > 0 ? number_format($starCounts[3] / $total * 100, 1) : 0 }}%;">
                            </div>

                        </div>

                    </div>

                    <div style="width:45px;" class="text-end">
                        {{ $starCounts[3] }}
                    </div>

                </div>


                <!-- 2 Star -->
                <div class="d-flex align-items-center mb-3">

                    <div style="width:70px;">
                        2 <i class="fa-solid fa-star text-warning"></i>
                    </div>

                    <div class="flex-grow-1 mx-2">

                        <div class="progress">

                            <div
                                class="progress-bar bg-secondary"
                                style="width: {{ $total > 0 ? number_format($starCounts[2] / $total * 100, 1) : 0 }}%;">
                            </div>

                        </div>

                    </div>

                    <div style="width:45px;" class="text-end">
                        {{ $starCounts[2] }}
                    </div>

                </div>


                <!-- 1 Star -->
                <div class="d-flex align-items-center">

                    <div style="width:70px;">
                        1 <i class="fa-solid fa-star text-warning"></i>
                    </div>

                    <div class="flex-grow-1 mx-2">

                        <div class="progress">

                            <div
                                class="progress-bar bg-danger"
                                style="width: {{ $total > 0 ? number_format($starCounts[1] / $total * 100, 1) : 0 }}%;">
                            </div>

                        </div>

                    </div>

                    <div style="width:45px;" class="text-end">
                        {{ $starCounts[1] }}
                    </div>

                </div>

            </div>

        </div>


        <!-- ================= SUMMARY ================= -->
        <div class="col-lg-7">

            <div class="summary-box p-4 h-100">

                <h5 class="fw-bold mb-4">
                    Review Summary
                </h5>

                <div class="row g-3">

                    <div class="col-sm-6">

                        <div class="p-3 bg-light rounded-3">

                            <small class="text-muted">
                                5 Star Reviews
                            </small>

                            <h4 class="fw-bold mt-2 mb-0">
                                {{ $starCounts[5] }}
                            </h4>

                        </div>

                    </div>


                    <div class="col-sm-6">

                        <div class="p-3 bg-light rounded-3">

                            <small class="text-muted">
                                4 Star Reviews
                            </small>

                            <h4 class="fw-bold mt-2 mb-0">
                                {{ $starCounts[4] }}
                            </h4>

                        </div>

                    </div>


                    <div class="col-sm-6">

                        <div class="p-3 bg-light rounded-3">

                            <small class="text-muted">
                                3 Star Reviews
                            </small>

                            <h4 class="fw-bold mt-2 mb-0">
                                {{ $starCounts[3] }}
                            </h4>

                        </div>

                    </div>


                    <div class="col-sm-6">

                        <div class="p-3 bg-light rounded-3">

                            <small class="text-muted">
                                1–2 Star Reviews
                            </small>

                            <h4 class="fw-bold mt-2 mb-0">
                                {{ $starCounts[1] + $starCounts[2] }}
                            </h4>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>


    <!-- ================= CUSTOMER COMMENTS ================= -->
    <div class="summary-box p-4">

        <div class="d-flex flex-wrap justify-content-between align-items-center mb-4">

            <div>

                <h5 class="fw-bold mb-1">
                    Customer Comments
                </h5>

                <small class="text-muted">
                    Latest customer feedback
                </small>

            </div>


            <select class="form-select filter-box mt-3 mt-md-0"
                    style="width:180px;">

                <option>All Ratings</option>
                <option>5 Stars</option>
                <option>4 Stars</option>
                <option>3 Stars</option>
                <option>2 Stars</option>
                <option>1 Star</option>

            </select>

        </div>


        <!-- Review 1 -->
        <div class="review-card p-3 mb-3">

            <div class="d-flex">

                <div class="avatar me-3">
                    D
                </div>

                <div class="flex-grow-1">

                    <div class="d-flex justify-content-between">

                        <div>

                            <h6 class="fw-bold mb-1">
                                Dara Sok
                            </h6>

                            <div class="stars">
                                ★★★★★
                            </div>

                        </div>

                        <small class="text-muted">
                            08 Sep 2026
                        </small>

                    </div>

                    <p class="text-muted mt-3 mb-2">
                        The vegetables are very fresh and the quality
                        is excellent. I really like this product.
                    </p>

                    <span class="product-name">
                        <i class="fa-solid fa-basket-shopping me-1"></i>
                        Fresh Vegetables
                    </span>

                </div>

            </div>

        </div>


        <!-- Review 2 -->
        <div class="review-card p-3 mb-3">

            <div class="d-flex">

                <div class="avatar me-3">
                    S
                </div>

                <div class="flex-grow-1">

                    <div class="d-flex justify-content-between">

                        <div>

                            <h6 class="fw-bold mb-1">
                                Sopheak Chan
                            </h6>

                            <div class="stars">
                                ★★★★☆
                            </div>

                        </div>

                        <small class="text-muted">
                            07 Sep 2026
                        </small>

                    </div>

                    <p class="text-muted mt-3 mb-2">
                        Good product and fast delivery. The fruit
                        was fresh when I received it.
                    </p>

                    <span class="product-name">
                        <i class="fa-solid fa-apple-whole me-1"></i>
                        Fresh Fruits
                    </span>

                </div>

            </div>

        </div>


        <!-- Review 3 -->
        <div class="review-card p-3 mb-3">

            <div class="d-flex">

                <div class="avatar me-3">
                    L
                </div>

                <div class="flex-grow-1">

                    <div class="d-flex justify-content-between">

                        <div>

                            <h6 class="fw-bold mb-1">
                                Lina Vann
                            </h6>

                            <div class="stars">
                                ★★★★★
                            </div>

                        </div>

                        <small class="text-muted">
                            06 Sep 2026
                        </small>

                    </div>

                    <p class="text-muted mt-3 mb-2">
                        Excellent quality! The eggs are fresh and
                        carefully packed.
                    </p>

                    <span class="product-name">
                        <i class="fa-solid fa-egg me-1"></i>
                        Fresh Eggs
                    </span>

                </div>

            </div>

        </div>


        <!-- Review 4 -->
        <div class="review-card p-3">

            <div class="d-flex">

                <div class="avatar me-3">
                    K
                </div>

                <div class="flex-grow-1">

                    <div class="d-flex justify-content-between">

                        <div>

                            <h6 class="fw-bold mb-1">
                                Kim Dara
                            </h6>

                            <div class="stars">
                                ★★★☆☆
                            </div>

                        </div>

                        <small class="text-muted">
                            05 Sep 2026
                        </small>

                    </div>

                    <p class="text-muted mt-3 mb-2">
                        The product is good, but I think the packaging
                        could be improved.
                    </p>

                    <span class="product-name">
                        <i class="fa-solid fa-seedling me-1"></i>
                        Fresh Nuts
                    </span>

                </div>

            </div>

        </div>


        <!-- Pagination -->
        <div class="d-flex justify-content-center mt-4">

            <nav>

                <ul class="pagination">

                    <li class="page-item disabled">
                        <a class="page-link" href="#">
                            Previous
                        </a>
                    </li>

                    <li class="page-item active">
                        <a class="page-link" href="#">
                            1
                        </a>
                    </li>

                    <li class="page-item">
                        <a class="page-link" href="#">
                            2
                        </a>
                    </li>

                    <li class="page-item">
                        <a class="page-link" href="#">
                            3
                        </a>
                    </li>

                    <li class="page-item">
                        <a class="page-link" href="#">
                            Next
                        </a>
                    </li>

                </ul>

            </nav>

        </div>

    </div>

</div>

</body>
</html>