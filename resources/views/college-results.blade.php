<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>College Cutoffs - {{ $collegeName }}</title>

    <!-- Bootstrap 5.3 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Outfit', sans-serif;
            background-color: #f8fafc;
            color: #1e293b;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .navbar {
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.05);
        }

        .navbar-brand {
            font-weight: 800;
            font-size: 1.5rem;
        }

        .hero-section {
            background: linear-gradient(135deg, #4f46e5 0%, #2563eb 100%);
            border-bottom-left-radius: 2rem;
            border-bottom-right-radius: 2rem;
            position: relative;
            overflow: hidden;
        }

        .card {
            border: none;
            border-radius: 1.25rem;
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.05), 0 8px 10px -6px rgba(0, 0, 0, 0.05);
            background-color: #ffffff;
            overflow: hidden;
        }

        .card-header-custom {
            background-color: #ffffff;
            border-bottom: 1px solid #f1f5f9;
            padding: 1.5rem 2rem;
        }

        /* Sticky Table Header styling */
        .table-responsive-sticky {
            max-height: 550px;
            overflow-y: auto;
            border-radius: 0.75rem;
            border: 1px solid #e2e8f0;
        }

        .table-sticky {
            margin-bottom: 0;
            border-collapse: separate;
            border-spacing: 0;
        }

        .table-sticky thead th {
            position: sticky;
            top: 0;
            z-index: 10;
            font-weight: 700;
            text-transform: uppercase;
            font-size: 0.75rem;
            letter-spacing: 0.05em;
            background-color: #f8fafc;
            color: #475569;
            border-bottom: 2px solid #e2e8f0;
            padding: 1rem 1.25rem;
            box-shadow: inset 0 -1px 0 #cbd5e1;
        }

        .table-sticky td {
            padding: 1rem 1.25rem;
            vertical-align: middle;
            color: #334155;
            font-size: 0.95rem;
            border-bottom: 1px solid #f1f5f9;
        }

        .table-sticky tbody tr:hover {
            background-color: #f8fafc;
        }

        .btn-action {
            background-color: #ffffff;
            color: #4f46e5;
            border: 1px solid #cbd5e1;
            border-radius: 0.75rem;
            padding: 0.75rem 1.5rem;
            font-weight: 600;
            transition: all 0.2s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .btn-action:hover {
            background-color: #f1f5f9;
            color: #2563eb;
            border-color: #94a3b8;
        }

        .footer {
            margin-top: auto;
            background-color: #ffffff;
            border-top: 1px solid #e2e8f0;
        }
    </style>
</head>
<body>

    <!-- Header Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center gap-2 text-primary" href="/predictor">
                <i class="bi bi-mortarboard-fill text-primary" style="font-size: 1.8rem;"></i>
                <span style="background: linear-gradient(135deg, #4f46e5 0%, #2563eb 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">EduPredict</span>
            </a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <i class="bi bi-list fs-3"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto gap-2 mt-3 mt-lg-0">
                    <li class="nav-item">
                        <a class="nav-link px-3 py-2 text-secondary fw-semibold" href="/predictor">
                            <i class="bi bi-cpu me-1"></i>Predictor
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active px-3 py-2 rounded-pill bg-light fw-semibold text-primary" href="/college-search">
                            <i class="bi bi-search me-1"></i>Cutoff Search
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Header -->
    <div class="hero-section text-white py-4 text-center mb-4">
        <div class="container py-2">
            <h2 class="fw-extrabold mb-1">College Cutoff Results</h2>
            <p class="lead opacity-90 small mb-0">Historical admission cutoffs database lookup.</p>
        </div>
    </div>

    <!-- Main Content Container -->
    <div class="container mb-5">
        
        <div class="card mb-4">
            <!-- College Details Header -->
            <div class="card-header-custom bg-light bg-opacity-50">
                <div class="row align-items-center g-3">
                    <div class="col-md-8">
                        <span class="badge bg-primary-subtle text-primary border border-primary-subtle px-3 py-2 mb-2 rounded-pill small fw-bold">
                            <i class="bi bi-building me-1"></i> Selected Institution
                        </span>
                        <h3 class="fw-bold mb-1 text-dark">{{ $collegeName }}</h3>
                        <div class="text-secondary small mt-2 d-flex flex-wrap gap-3">
                            <span><strong>Admission Type:</strong> {{ $admissionType }}</span>
                            <span class="text-muted">|</span>
                            <span><strong>Reference Year:</strong> {{ $year }}</span>
                        </div>
                    </div>
                    <div class="col-md-4 text-md-end">
                        <div class="bg-white border rounded-3 p-3 d-inline-block shadow-sm">
                            <div class="text-muted small text-uppercase fw-bold mb-1">Records Found</div>
                            <h4 class="fw-extrabold text-primary mb-0">
                                {{ $cutoffs->count() }}
                            </h4>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Table Body -->
            <div class="card-body p-4">
                
                @if($cutoffs->count())
                    
                    <div class="table-responsive-sticky">
                        <table class="table table-sticky align-middle table-hover">
                            <thead>
                                <tr>
                                    <th width="55%">Branch Name</th>
                                    <th width="20%" class="text-center">Category</th>
                                    <th width="25%" class="text-center">Cutoff Percentile</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($cutoffs as $cutoff)
                                    <tr>
                                        <td class="fw-semibold text-dark">
                                            {{ $cutoff->branch_name }}
                                        </td>
                                        <td class="text-center">
                                            <span class="badge bg-light text-secondary border px-3 py-1.5 fw-semibold">
                                                {{ $cutoff->category }}
                                            </span>
                                        </td>
                                        <td class="text-center fw-bold text-primary">
                                            {{ number_format($cutoff->percentile, 3) }}%
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                @else

                    <div class="alert alert-warning border border-warning-subtle rounded-3 p-4 text-center">
                        <i class="bi bi-exclamation-triangle text-warning fs-1 mb-2 d-block"></i>
                        <h5 class="fw-bold text-dark">No Cutoff Records Found</h5>
                        <p class="text-secondary mb-0">
                            We couldn't retrieve any records for the specified selection.
                        </p>
                        <div class="mt-3 p-2 bg-light d-inline-block rounded border small text-muted">
                            College: {{ $collegeName }} <br>
                            Type: {{ $admissionType }} | Year: {{ $year }}
                        </div>
                    </div>

                @endif

            </div>

            <!-- Card Footer actions -->
            <div class="card-footer bg-white border-0 text-center py-4">
                <a href="/college-search" class="btn btn-action">
                    <i class="bi bi-arrow-left"></i> Search Another College
                </a>
            </div>
        </div>

    </div>

    <!-- Footer -->
    <footer class="footer py-4">
        <div class="container text-center">
            <h6 class="fw-bold text-dark mb-1">Engineering Admission Predictor</h6>
            <p class="text-muted small mb-2">FE & DSE Cutoff Analysis Platform</p>
            <div class="mb-0">
                <span class="badge bg-light text-secondary border px-3 py-2">
                    <i class="bi bi-shield-check text-primary me-1"></i> Powered by Official CET Cell Data
                </span>
            </div>
        </div>
    </footer>

    <!-- Bootstrap Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>