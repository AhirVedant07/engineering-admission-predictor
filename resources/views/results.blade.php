<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admission Results - Recommended Colleges</title>

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

        .stat-card {
            background-color: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 1rem;
            padding: 1rem 1.25rem;
            display: flex;
            align-items: center;
            gap: 1rem;
            height: 100%;
        }

        .stat-icon {
            width: 48px;
            height: 48px;
            border-radius: 0.75rem;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            flex-shrink: 0;
        }

        .stat-icon.primary {
            background-color: rgba(79, 70, 229, 0.08);
            color: #4f46e5;
        }

        .stat-icon.success {
            background-color: rgba(16, 185, 129, 0.08);
            color: #10b981;
        }

        .stat-icon.info {
            background-color: rgba(14, 165, 233, 0.08);
            color: #0ea5e9;
        }

        .stat-label {
            font-size: 0.75rem;
            color: #64748b;
            text-transform: uppercase;
            font-weight: 700;
            letter-spacing: 0.05em;
            margin-bottom: 0.15rem;
        }

        .stat-value {
            font-size: 1.15rem;
            font-weight: 700;
            color: #0f172a;
            margin-bottom: 0;
        }

        .table {
            margin-bottom: 0;
        }

        .table th {
            font-weight: 700;
            text-transform: uppercase;
            font-size: 0.75rem;
            letter-spacing: 0.05em;
            background-color: #f8fafc;
            color: #475569;
            border-bottom: 2px solid #e2e8f0;
            padding: 1rem 1.25rem;
        }

        .table td {
            padding: 1.25rem;
            vertical-align: middle;
            color: #334155;
            font-size: 0.95rem;
            border-bottom: 1px solid #f1f5f9;
        }

        .table tbody tr:hover {
            background-color: #f8fafc;
        }

        .badge-chance {
            font-size: 0.8rem;
            font-weight: 600;
            padding: 0.4rem 0.75rem;
            border-radius: 2rem;
            display: inline-flex;
            align-items: center;
            gap: 0.35rem;
        }

        .badge-chance.safe {
            background-color: rgba(16, 185, 129, 0.08);
            color: #10b981;
            border: 1px solid rgba(16, 185, 129, 0.2);
        }

        .badge-chance.moderate {
            background-color: rgba(245, 158, 11, 0.08);
            color: #d97706;
            border: 1px solid rgba(245, 158, 11, 0.2);
        }

        .badge-chance.dream {
            background-color: rgba(239, 68, 68, 0.08);
            color: #ef4444;
            border: 1px solid rgba(239, 68, 68, 0.2);
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
                        <a class="nav-link active px-3 py-2 rounded-pill bg-light fw-semibold text-primary" href="/predictor">
                            <i class="bi bi-cpu me-1"></i>Predictor
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-3 py-2 text-secondary fw-semibold" href="/college-search">
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
            <h2 class="fw-extrabold mb-1">Recommended Colleges</h2>
            <p class="lead opacity-90 small mb-0">Admission predictor search results based on your profile.</p>
        </div>
    </div>

    <!-- Main Results Container -->
    <div class="container mb-5">
        
        <!-- Summary Stats Recaps -->
        <div class="row g-3 mb-4">
            <div class="col-md-3 col-6">
                <div class="stat-card">
                    <div class="stat-icon primary">
                        <i class="bi bi-award"></i>
                    </div>
                    <div>
                        <div class="stat-label">Percentile</div>
                        <h4 class="stat-value">{{ $percentile }}%</h4>
                    </div>
                </div>
            </div>
            
            <div class="col-md-3 col-6">
                <div class="stat-card">
                    <div class="stat-icon success">
                        <i class="bi bi-calendar3"></i>
                    </div>
                    <div>
                        <div class="stat-label">Cutoff Year</div>
                        <h4 class="stat-value">{{ $year }}</h4>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-6">
                <div class="stat-card">
                    <div class="stat-icon info">
                        <i class="bi bi-tags"></i>
                    </div>
                    <div>
                        <div class="stat-label">Category</div>
                        <h4 class="stat-value">{{ $category }}</h4>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-6">
                <div class="stat-card">
                    <div class="stat-icon primary">
                        <i class="bi bi-journals"></i>
                    </div>
                    <div>
                        <div class="stat-label">Branch Filter</div>
                        <h4 class="stat-value text-truncate" style="max-width: 140px;">
                            {{ $branch ?: 'All Branches' }}
                        </h4>
                    </div>
                </div>
            </div>
        </div>

        <!-- Colleges Results Card -->
        <div class="card mb-4">
            <div class="card-header-custom d-flex align-items-center justify-content-between flex-wrap gap-2">
                <div>
                    <h5 class="fw-bold mb-0 text-dark">Eligible Cutoff Records</h5>
                    <p class="text-muted small mb-0">Colleges sorted by closest matching percentile cutoff.</p>
                </div>
                <div>
                    <span class="badge bg-light text-secondary border px-3 py-2">
                        Type: {{ $admissionType ?? 'FE' }}
                    </span>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table align-middle">
                    <thead>
                        <tr>
                            <th>College</th>
                            <th>Branch</th>
                            <th class="text-center">Category</th>
                            <th class="text-center">Cutoff (%)</th>
                            <th class="text-center">Admission Chance</th>
                        </tr>
                    </thead>
                    <tbody>
                    @forelse($colleges as $college)
                        <tr>
                            <td class="fw-semibold text-dark">{{ $college->college_name }}</td>
                            <td>
                                <span class="d-inline-block text-secondary small bg-light px-2.5 py-1 rounded border">
                                    {{ $college->branch_name }}
                                </span>
                            </td>
                            <td class="text-center">
                                <span class="badge bg-secondary-subtle text-secondary-emphasis rounded-pill px-2.5 py-1">
                                    {{ $college->category }}
                                </span>
                            </td>
                            <td class="text-center fw-bold text-indigo">{{ $college->percentile }}</td>
                            <td class="text-center">
                                @if($college->percentile <= ($percentile - 5))
                                    <span class="badge-chance safe">
                                        <i class="bi bi-shield-check"></i> Safe
                                    </span>
                                @elseif($college->percentile <= $percentile)
                                    <span class="badge-chance moderate">
                                        <i class="bi bi-exclamation-triangle"></i> Moderate
                                    </span>
                                @else
                                    <span class="badge-chance dream">
                                        <i class="bi bi-stars"></i> Dream
                                    </span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center py-5">
                                <div class="d-flex flex-column align-items-center justify-content-center text-muted">
                                    <i class="bi bi-info-circle text-warning fs-1 mb-2"></i>
                                    <h5 class="fw-bold text-dark">No matches found</h5>
                                    <p class="small mb-0 px-3">We couldn't find any cutoffs matching your percentile of {{ $percentile }}% in the category {{ $category }}.</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Footer Action inside Card -->
            <div class="card-footer bg-white border-0 text-center py-4">
                <a href="/predictor" class="btn btn-action">
                    <i class="bi bi-arrow-left"></i> Run Another Prediction
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