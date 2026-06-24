<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Engineering Admission Predictor</title>

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

        .form-select, .form-control {
            border-radius: 0.75rem;
            border: 1px solid #e2e8f0;
            padding: 0.75rem 1rem;
            font-size: 0.95rem;
            color: #0f172a;
            background-color: #f8fafc;
            transition: all 0.2s ease-in-out;
        }

        .form-select:focus, .form-control:focus {
            border-color: #818cf8;
            background-color: #ffffff;
            box-shadow: 0 0 0 0.25rem rgba(99, 102, 241, 0.12);
        }

        .btn-gradient {
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

        .btn-gradient:hover {
            color: #ffffff;
            transform: translateY(-1px);
            box-shadow: 0 6px 20px rgba(79, 70, 229, 0.25);
        }

        .btn-secondary-custom {
            background-color: #ffffff;
            color: #4f46e5;
            border: 1px solid #e2e8f0;
            border-radius: 0.75rem;
            padding: 0.85rem 1.5rem;
            font-weight: 600;
            transition: all 0.2s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
        }

        .btn-secondary-custom:hover {
            background-color: #f1f5f9;
            color: #2563eb;
            border-color: #cbd5e1;
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

    <!-- Hero Section -->
    <div class="hero-section text-white py-5 text-center mb-5">
        <div class="container py-2">
            <span class="info-pill bg-white bg-opacity-20 text-white mb-3">Admission Portal 2026</span>
            <h1 class="display-5 fw-extrabold mb-2">Engineering Admission Predictor</h1>
            <p class="lead opacity-90 max-w-2xl mx-auto mb-0 px-3">
                Instantly find and evaluate engineering colleges that match your cutoff percentile score.
            </p>
        </div>
    </div>

    <!-- Main Content -->
    <div class="container mb-5">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8">
                
                <div class="card">
                    <div class="card-header-custom text-center">
                        <h4 class="fw-bold mb-1 text-dark">Find Eligible Colleges</h4>
                        <p class="text-muted small mb-0">Enter your score and filters to run the prediction algorithm.</p>
                    </div>

                    <div class="card-body-custom">
                        <form method="POST" action="/results">
                            @csrf

                            <!-- Admission Type -->
                            <div class="mb-4">
                                <label class="form-label" for="admission_type">
                                    <i class="bi bi-person-badge text-primary"></i> Admission Type
                                </label>
                                <select
                                    name="admission_type"
                                    id="admission_type"
                                    class="form-select"
                                    onchange="changeCategories()">
                                    <option value="FE">
                                        First Year Engineering (FE)
                                    </option>
                                    <option value="DSE">
                                        Direct Second Year Engineering (DSE)
                                    </option>
                                </select>
                            </div>

                            <!-- Year -->
                            <div class="mb-4">
                                <label class="form-label">
                                    <i class="bi bi-calendar3 text-primary"></i> Reference Year
                                </label>
                                <select
                                    name="year"
                                    class="form-select">
                                    <option value="2025">2025 Cutoffs</option>
                                    <option value="2024">2024 Cutoffs</option>
                                </select>
                            </div>

                            <!-- Category -->
                            <div class="mb-4">
                                <label class="form-label" for="category">
                                    <i class="bi bi-tags text-primary"></i> Category
                                </label>
                                <select
                                    name="category"
                                    id="category"
                                    class="form-select">
                                    <!-- Populated via javascript -->
                                </select>
                            </div>

                            <!-- Branch -->
                            <div class="mb-4">
                                <label class="form-label">
                                    <i class="bi bi-journals text-primary"></i> Preferred Branch
                                </label>
                                <select
                                    name="branch"
                                    class="form-select">
                                    <option value="">All Branches</option>
                                    <option value="Computer">Computer Engineering</option>
                                    <option value="Information Technology">Information Technology</option>
                                    <option value="Artificial Intelligence">Artificial Intelligence</option>
                                    <option value="Data Science">Data Science</option>
                                    <option value="Electronics">Electronics & Telecommunication</option>
                                    <option value="Electrical">Electrical Engineering</option>
                                    <option value="Mechanical">Mechanical Engineering</option>
                                    <option value="Civil">Civil Engineering</option>
                                    <option value="Instrumentation">Instrumentation Engineering</option>
                                    <option value="Chemical">Chemical Engineering</option>
                                </select>
                            </div>

                            <!-- Percentile -->
                            <div class="mb-4">
                                <label class="form-label">
                                    <i class="bi bi-percent text-primary"></i> CET Percentile
                                </label>
                                <input
                                    type="number"
                                    step="0.01"
                                    name="percentile"
                                    class="form-control"
                                    placeholder="e.g. 98.45"
                                    required>
                            </div>

                            <!-- Predict Button -->
                            <button
                                type="submit"
                                class="btn btn-gradient w-100 mb-3 py-3 d-flex align-items-center justify-content-center gap-2">
                                <i class="bi bi-lightning-charge-fill"></i>
                                Predict Colleges
                            </button>
                        </form>

                        <!-- Search College Cutoffs Link -->
                        <div class="text-center pt-2 border-top">
                            <p class="text-muted small mb-3">Or explore specific college details directly</p>
                            <a href="/college-search" class="btn btn-secondary-custom w-100 py-2.5">
                                <i class="bi bi-search"></i>
                                Search College Cutoffs
                            </a>
                        </div>
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

    <!-- Bootstrap Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Categories Select Script -->
    <script>
    function changeCategories()
    {
        let type = document.getElementById('admission_type').value;
        let category = document.getElementById('category');

        category.innerHTML = '';

        if(type === 'FE')
        {
            let feCategories = [
                'GOPENS',
                'GOBCS',
                'GSCS',
                'GSEBCS',
                'GVJS',
                'GNT1S',
                'GNT2S',
                'GNT3S',
                'GSTS',
                'EWS'
            ];

            feCategories.forEach(function(item){
                category.innerHTML +=
                `<option value="${item}">${item}</option>`;
            });
        }
        else
        {
            let dseCategories = [
                'GOPEN',
                'GOBC',
                'GSC',
                'GST',
                'GNTA',
                'GNTB',
                'GNTC',
                'GSEBC',
                'EWS',
                'LOPEN',
                'LOBC',
                'LSC',
                'LST',
                'LSEBC'
            ];

            dseCategories.forEach(function(item){
                category.innerHTML +=
                `<option value="${item}">${item}</option>`;
            });
        }
    }

    window.onload = changeCategories;
    </script>
</body>
</html>