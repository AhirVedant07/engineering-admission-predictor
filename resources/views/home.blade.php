<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Engineering Admission Assistant</title>
    <style>
        body{
            font-family:Arial;
            background:#f5f7fa;
            text-align:center;
            padding-top:100px;
        }

        .card{
            background:white;
            width:500px;
            margin:auto;
            padding:40px;
            border-radius:15px;
            box-shadow:0 0 15px rgba(0,0,0,.1);
        }

        button{
            background:#2563eb;
            color:white;
            border:none;
            padding:15px 30px;
            border-radius:8px;
            cursor:pointer;
        }
    </style>
</head>
<body>
<div class="container mt-5">

    <div class="card shadow p-4">

        <h2 class="text-center mb-4">
            Engineering Admission Predictor
        </h2>

        <form method="POST" action="/results">
            @csrf

            <div class="mb-3">
                <label>Year</label>
                <select name="year" class="form-control">
                    <option value="2025" selected>2025</option>
                    <option value="2024">2024</option>
                </select>
            </div>

            <div class="mb-3">
                <label>Category</label>
                <select name="category" class="form-control">
                    <option value="GOPENS">GOPENS</option>
                    <option value="GOBCS">GOBCS</option>
                    <option value="GSCS">GSCS</option>
                    <option value="GSEBCS">GSEBCS</option>
                    <option value="EWS">EWS</option>
                </select>
            </div>

            <div class="mb-3">
                <label>Percentile</label>
                <input
                    type="number"
                    step="0.01"
                    name="percentile"
                    class="form-control"
                    placeholder="Enter Percentile">
            </div>

            <button class="btn btn-primary w-100">
                Predict Colleges
            </button>

        </form>

    </div>

</div>
</body>
</html>