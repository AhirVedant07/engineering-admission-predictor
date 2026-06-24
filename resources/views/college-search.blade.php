<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>College Cutoff Search</title>

    <!-- Bootstrap 5.3 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <!-- Select2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>
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

        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: radial-gradient(circle at 10% 20%, rgba(255, 255, 255, 0.1) 0%, transparent 80%);
            pointer-events: none;
        }

        .card {
            border: none;
            border-radius: 1.25rem;
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.05), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
            overflow: hidden;
            background-color: #ffffff;
        }

        .card-header-custom {
            background-color: #ffffff;
            border-bottom: 1px solid #f1f5f9;
            padding: 1.5rem 2rem;
        }

        .card-body-custom {
            padding: 2rem;
        }

        .form-label {
            font-weight: 600;
            color: #334155;
            font-size: 0.9rem;
            margin-bottom: 0.5rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .form-select {
            border-radius: 0.75rem;
            border: 1px solid #e2e8f0;
            padding: 0.75rem 1rem;
            font-size: 0.95rem;
            color: #0f172a;
            background-color: #f8fafc;
            transition: all 0.2s ease-in-out;
        }

        .form-select:focus {
            border-color: #818cf8;
            background-color: #ffffff;
            box-shadow: 0 0 0 0.25rem rgba(99, 102, 241, 0.12);
        }

        /* Custom Select2 Styling Overrides to match Bootstrap 5 SaaS theme */
        .select2-container--default .select2-selection--single {
            border: 1px solid #e2e8f0 !important;
            border-radius: 0.75rem !important;
            height: auto !important;
            padding: 0.7rem 1rem !important;
            background-color: #f8fafc !important;
            transition: all 0.2s ease-in-out !important;
        }

        .select2-container--default .select2-selection--single:focus,
        .select2-container--default.select2-container--open .select2-selection--single {
            border-color: #818cf8 !important;
            background-color: #ffffff !important;
            box-shadow: 0 0 0 0.25rem rgba(99, 102, 241, 0.12) !important;
        }

        .select2-container--default .select2-selection--single .select2-selection__rendered {
            color: #0f172a !important;
            padding-left: 0 !important;
            line-height: inherit !important;
            font-size: 0.95rem !important;
        }

        .select2-container--default .select2-selection--single .select2-selection__placeholder {
            color: #64748b !important;
        }

        .select2-container--default .select2-selection--single .select2-selection__arrow {
            height: 100% !important;
            top: 0 !important;
            right: 0.75rem !important;
        }

        .select2-container--default .select2-selection--single .select2-selection__arrow b {
            border-color: #64748b transparent transparent transparent !important;
            border-width: 6px 4px 0 4px !important;
        }

        .select2-container--default.select2-container--open .select2-selection--single .select2-selection__arrow b {
            border-color: transparent transparent #64748b transparent !important;
            border-width: 0 4px 6px 4px !important;
        }

        .select2-dropdown {
            border: 1px solid #e2e8f0 !important;
            border-radius: 0.75rem !important;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.05), 0 4px 6px -4px rgba(0, 0, 0, 0.05) !important;
            overflow: hidden !important;
            background-color: #ffffff !important;
            z-index: 1060 !important;
        }

        .select2-container--default .select2-search--dropdown .select2-search__field {
            border: 1px solid #e2e8f0 !important;
            border-radius: 0.5rem !important;
            padding: 0.5rem 0.75rem !important;
            outline: none !important;
        }

        .select2-container--default .select2-results__option--highlighted[aria-selected] {
            background-color: #4f46e5 !important;
            color: #ffffff !important;
        }

        .select2-container--default .select2-results__option {
            padding: 0.6rem 1rem !important;
            font-size: 0.9rem !important;
        }

        .btn-gradient-success {
            background: linear-gradient(135deg, #4f46e5 0%, #2563eb 100%);
            color: #ffffff;
            border: none;
            border-radius: 0.75rem;
            padding: 0.85rem 1.5rem;
            font-weight: 600;
            font-size: 1rem;
            transition: all 0.2s ease;
            box-shadow: 0 4px 12px rgba(79, 70, 229, 0.15);
        }

        .btn-gradient-success:hover {
            color: #ffffff;
            transform: translateY(-1px);
            box-shadow: 0 6px 20px rgba(79, 70, 229, 0.25);
        }

        .info-pill {
            background-color: rgba(79, 70, 229, 0.08);
            color: #4f46e5;
            font-size: 0.8rem;
            font-weight: 600;
            padding: 0.25rem 0.75rem;
            border-radius: 2rem;
            display: inline-block;
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

    <!-- Hero Section -->
    <div class="hero-section text-white py-5 text-center mb-5">
        <div class="container py-2">
            <span class="info-pill bg-white bg-opacity-20 text-white mb-3">Database Lookup</span>
            <h1 class="display-5 fw-extrabold mb-2">Search College Cutoffs</h1>
            <p class="lead opacity-90 max-w-2xl mx-auto mb-0 px-3">
                Look up comprehensive cutoff scores for specific engineering colleges in Maharashtra.
            </p>
        </div>
    </div>

    <!-- Main Content -->
    <div class="container mb-5">
        <div class="row justify-content-center">
            <div class="col-lg-7 col-md-9">
                
                <div class="card">
                    <div class="card-header-custom text-center">
                        <h4 class="fw-bold mb-1 text-dark">Cutoff Query Tool</h4>
                        <p class="text-muted small mb-0">Search historical branch-wise cutoff scores for any institution.</p>
                    </div>

                    <div class="card-body-custom">
                        <form method="POST" action="/college-results">
                            @csrf

                            <!-- Admission Type -->
                            <div class="mb-4">
                                <label class="form-label">
                                    <i class="bi bi-person-badge text-primary"></i> Admission Type
                                </label>
                                <select name="admission_type" class="form-select">
                                    <option value="FE">
                                        First Year Engineering (FE)
                                    </option>
                                    <option value="DSE">
                                        Direct Second Year (DSE)
                                    </option>
                                </select>
                            </div>

                            <!-- Year -->
                            <div class="mb-4">
                                <label class="form-label">
                                    <i class="bi bi-calendar3 text-primary"></i> Target Year
                                </label>
                                <select name="year" class="form-select">
                                    <option value="2025">2025</option>
                                    <option value="2024">2024</option>
                                </select>
                            </div>

                            <!-- College Name -->
                            <div class="mb-4">
                                <label class="form-label" for="collegeDropdown">
                                    <i class="bi bi-building text-primary"></i> Select Institution
                                </label>
                                <select
                                    id="collegeDropdown"
                                    name="college_name"
                                    class="form-select">
                                    @foreach($colleges as $college)
                                        <option value="{{ $college }}">
                                            {{ $college }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Search Button -->
                            <button
                                type="submit"
                                class="btn btn-gradient-success w-100 py-3 d-flex align-items-center justify-content-center gap-2">
                                <i class="bi bi-search"></i>
                                Search Cutoffs
                            </button>
                        </form>
                    </div>
                </div>

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

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
    $(document).ready(function() {
        $('#collegeDropdown').select2({
            placeholder: 'Search College...',
            width: '100%'
        });
    });
    </script>
</body>
</html>