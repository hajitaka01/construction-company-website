<?php 
require_once '../includes/config.php';
$pageTitle = "Tính Chi Phí Xây Nhà - Hoàng Gia Khánh";
include '../includes/header.php';
include '../includes/navbar.php';
?>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-gradient: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
            --secondary-gradient: linear-gradient(135deg, #0077be 0%, #1b5e96 100%);
            --success-gradient: linear-gradient(135deg, #00c6ff 0%, #0072ff 100%);
            --card-shadow: 0 10px 30px rgba(0, 30, 60, 0.15);
            --hover-shadow: 0 20px 40px rgba(0, 30, 60, 0.25);
        }

        body {
            background: linear-gradient(45deg, #d3d3d3 0%, #b0b0b0 50%, #a9a9a9 100%);
            min-height: 100vh;
            
            position: relative;
        }

        .container-fluid {
            padding: 2rem 0;
        }

        .main-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 20px;
            box-shadow: var(--card-shadow);
            transition: all 0.4s ease;
            overflow: hidden;
            position: relative;
        }

        .main-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
            transition: left 0.8s ease;
        }

        .main-card:hover::before {
            left: 100%;
        }

        .main-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--hover-shadow);
        }

        .header-section {
            background: var(--primary-gradient);
            color: white;
            padding: 2rem;
            margin: -1.5rem -1.5rem 2rem -1.5rem;
            position: relative;
            overflow: hidden;
        }

        .header-section::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 0;
            width: 100%;
            height: 20px;
            background: white;
            border-radius: 50% 50% 0 0 / 100% 100% 0 0;
        }

        .header-icon {
            font-size: 3rem;
            margin-bottom: 1rem;
            animation: bounce 2s infinite;
        }

        @keyframes bounce {
            0%, 20%, 50%, 80%, 100% { transform: translateY(0); }
            40% { transform: translateY(-10px); }
            60% { transform: translateY(-5px); }
        }

        .input-section {
            padding: 0 1rem;
        }

        .form-floating {
            margin-bottom: 1.5rem;
        }

        .form-control, .form-select {
            border: 2px solid #e9ecef;
            border-radius: 15px;
            transition: all 0.3s ease;
            background: rgba(255, 255, 255, 0.9);
        }

        .form-control:focus, .form-select:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 0.25rem rgba(102, 126, 234, 0.25);
            transform: scale(1.02);
        }

        .form-label {
            color: #495057;
            font-weight: 600;
        }

        .btn-calculate {
            background: var(--secondary-gradient);
            border: none;
            border-radius: 50px;
            padding: 15px 40px;
            font-weight: 600;
            font-size: 1.1rem;
            color: white;
            transition: all 0.3s ease;
            box-shadow: 0 5px 15px rgba(245, 87, 108, 0.4);
            position: relative;
            overflow: hidden;
        }

        .btn-calculate::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            background: rgba(255, 255, 255, 0.3);
            border-radius: 50%;
            transform: translate(-50%, -50%);
            transition: all 0.3s ease;
        }

        .btn-calculate:hover::before {
            width: 300px;
            height: 300px;
        }

        .btn-calculate:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(245, 87, 108, 0.6);
        }

        .results-section {
            margin-top: 2rem;
            padding: 0 1rem;
        }

        .results-table {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
            animation: slideIn 0.5s ease-out;
        }

        @keyframes slideIn {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .table th {
            background: var(--success-gradient);
            color: white;
            font-weight: 600;
            border: none;
            padding: 1rem;
            position: relative;
        }

        .table td {
            padding: 1rem;
            border-color: #f8f9fa;
            transition: all 0.3s ease;
        }

        .table tbody tr {
            transition: all 0.3s ease;
        }

        .table tbody tr:hover {
            background-color: #f8f9ff;
            transform: scale(1.01);
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .total-cost {
            background: var(--primary-gradient);
            color: white;
            padding: 2rem;
            border-radius: 15px;
            margin-top: 1.5rem;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .total-cost::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: repeating-linear-gradient(
                45deg,
                transparent,
                transparent 10px,
                rgba(255, 255, 255, 0.1) 10px,
                rgba(255, 255, 255, 0.1) 20px
            );
            animation: shimmer 3s linear infinite;
        }

        @keyframes shimmer {
            0% { transform: translateX(-100%) translateY(-100%); }
            100% { transform: translateX(100%) translateY(100%); }
        }

        .cost-value {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
            position: relative;
            z-index: 1;
        }

        .cost-label {
            font-size: 1.1rem;
            opacity: 0.9;
            position: relative;
            z-index: 1;
        }

        .icon-wrapper {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            margin-right: 10px;
        }

        .pulse {
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.05); }
            100% { transform: scale(1); }
        }

        .floating-elements {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: -1;
        }

        .floating-element {
            position: absolute;
            opacity: 0.1;
            animation: float 6s ease-in-out infinite;
        }

        .floating-element:nth-child(1) { top: 10%; left: 10%; animation-delay: 0s; }
        .floating-element:nth-child(2) { top: 20%; right: 10%; animation-delay: 1s; }
        .floating-element:nth-child(3) { bottom: 20%; left: 20%; animation-delay: 2s; }
        .floating-element:nth-child(4) { bottom: 10%; right: 20%; animation-delay: 3s; }

        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-20px) rotate(180deg); }
        }

        @media (max-width: 768px) {
            .container-fluid { padding: 1rem; }
            .header-section { padding: 1.5rem; margin: -1rem -1rem 1.5rem -1rem; }
            .header-icon { font-size: 2rem; }
            .cost-value { font-size: 1.5rem; }
        }
    </style>
<main class="main-content">
    <div class="floating-elements">
        <i class="fas fa-home floating-element" style="font-size: 3rem;"></i>
        <i class="fas fa-calculator floating-element" style="font-size: 2.5rem;"></i>
        <i class="fas fa-coins floating-element" style="font-size: 2rem;"></i>
        <i class="fas fa-building floating-element" style="font-size: 3.5rem;"></i>
    </div>

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-10 col-xl-8">
                <div class="card main-card">
                    <div class="card-body p-4">
                        <!-- Header Section -->
                        <div class="header-section text-center">
                            <div class="header-icon">
                                <i class="fas fa-calculator"></i>
                            </div>
                            <h1 class="mb-0 fw-bold">Tính Chi Phí Xây Nhà</h1>
                            <p class="mb-0 fs-5 opacity-90">Phần thô - Tính toán chính xác và chuyên nghiệp</p>
                        </div>

                        <!-- Input Section -->
                        <div class="input-section">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="number" class="form-control" id="tangTret" value="70">
                                        <label for="tangTret">
                                            <i class="fas fa-home icon-wrapper"></i>
                                            Diện tích sàn tầng trệt (m²)
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="number" class="form-control" id="lau" value="75">
                                        <label for="lau">
                                            <i class="fas fa-layer-group icon-wrapper"></i>
                                            Diện tích mỗi lầu (m²)
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="number" class="form-control" id="soLau" value="2">
                                        <label for="soLau">
                                            <i class="fas fa-building icon-wrapper"></i>
                                            Số lầu (không kể trệt)
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="number" class="form-control" id="tum" value="30">
                                        <label for="tum">
                                            <i class="fas fa-warehouse icon-wrapper"></i>
                                            Tum (m²)
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="number" class="form-control" id="sanThuong" value="45">
                                        <label for="sanThuong">
                                            <i class="fas fa-sun icon-wrapper"></i>
                                            Sân thượng (m²)
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="number" class="form-control" id="mai" value="35">
                                        <label for="mai">
                                            <i class="fas fa-home icon-wrapper"></i>
                                            Mái bê tông cốt thép (m²)
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="number" class="form-control" id="mong" value="70">
                                        <label for="mong">
                                            <i class="fas fa-foundation icon-wrapper"></i>
                                            Móng (m²)
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <select class="form-select" id="loaiNha">
                                            <option value="4900000">Nhà phố liên kế (4.900.000 đ/m²)</option>
                                            <option value="5200000">Biệt thự / Văn phòng / Khách sạn (5.200.000 đ/m²)</option>
                                        </select>
                                        <label for="loaiNha">
                                            <i class="fas fa-tags icon-wrapper"></i>
                                            Loại nhà
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="text-center mt-4">
                                <button class="btn btn-calculate pulse" onclick="tinhChiPhi()">
                                    <i class="fas fa-calculator me-2"></i>
                                    Tính Chi Phí
                                </button>
                            </div>
                        </div>

                        <!-- Results Section -->
                        <div class="results-section" id="resultsSection" style="display: none;">
                            <div class="results-table">
                                <table class="table table-hover mb-0">
                                    <thead>
                                        <tr>
                                            <th><i class="fas fa-list me-2"></i>Hạng mục</th>
                                            <th><i class="fas fa-ruler me-2"></i>Diện tích (m²)</th>
                                            <th><i class="fas fa-percentage me-2"></i>Hệ số</th>
                                            <th><i class="fas fa-calculator me-2"></i>Diện tích quy đổi (m²)</th>
                                        </tr>
                                    </thead>
                                    <tbody id="bangKetQua"></tbody>
                                </table>
                            </div>

                            <div class="total-cost">
                                <div class="cost-label">
                                    <i class="fas fa-chart-line me-2"></i>
                                    Tổng diện tích quy đổi
                                </div>
                                <div class="cost-value" id="tongDienTich">0 m²</div>
                                
                                <div class="cost-label mt-3">
                                    <i class="fas fa-money-bill-wave me-2"></i>
                                    Tổng chi phí phần thô
                                </div>
                                <div class="cost-value" id="tongChiPhi">0 VNĐ</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php include '../includes/footer.php'; ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script>
        function tinhChiPhi() {
            const heso = { santhuong: 0.5, mai: 0.5, mong: 0.5 };
            const bang = document.getElementById("bangKetQua");
            const resultsSection = document.getElementById("resultsSection");
            
            bang.innerHTML = "";
            
            const tret = parseFloat(document.getElementById("tangTret").value) || 0;
            const lau = parseFloat(document.getElementById("lau").value) || 0;
            const soLau = parseInt(document.getElementById("soLau").value) || 0;
            const tum = parseFloat(document.getElementById("tum").value) || 0;
            const sanThuong = parseFloat(document.getElementById("sanThuong").value) || 0;
            const mai = parseFloat(document.getElementById("mai").value) || 0;
            const mong = parseFloat(document.getElementById("mong").value) || 0;
            const donGia = parseInt(document.getElementById("loaiNha").value);
            
            const hangMuc = [
                { ten: "Tầng trệt", dientich: tret, heso: 1, icon: "fas fa-home" },
                { ten: `Lầu (${soLau} tầng)`, dientich: lau * soLau, heso: 1, icon: "fas fa-building" },
                { ten: "Tum", dientich: tum, heso: 1, icon: "fas fa-warehouse" },
                { ten: "Sân thượng", dientich: sanThuong, heso: heso.santhuong, icon: "fas fa-sun" },
                { ten: "Mái bê tông", dientich: mai, heso: heso.mai, icon: "fas fa-home" },
                { ten: "Móng", dientich: mong, heso: heso.mong, icon: "fas fa-foundation" }
            ];
            
            let tongDT = 0;
            
            hangMuc.forEach((h, index) => {
                const dtqd = h.dientich * h.heso;
                tongDT += dtqd;
                
                setTimeout(() => {
                    bang.innerHTML += `
                        <tr style="animation: slideIn 0.5s ease-out ${index * 0.1}s both;">
                            <td><i class="${h.icon} me-2 text-primary"></i><strong>${h.ten}</strong></td>
                            <td><span class="badge bg-light text-dark">${h.dientich.toLocaleString()}</span></td>
                            <td><span class="badge bg-info">${(h.heso * 100)}%</span></td>
                            <td><span class="badge bg-success">${dtqd.toLocaleString()}</span></td>
                        </tr>
                    `;
                }, index * 100);
            });
            
            const chiPhi = tongDT * donGia;
            
            setTimeout(() => {
                document.getElementById("tongDienTich").textContent = `${tongDT.toFixed(2)} m²`;
                document.getElementById("tongChiPhi").textContent = `${chiPhi.toLocaleString()} VNĐ`;
                resultsSection.style.display = "block";
                resultsSection.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }, hangMuc.length * 100 + 200);
        }

        // Auto calculate on input change
        document.querySelectorAll('input, select').forEach(element => {
            element.addEventListener('change', () => {
                if (document.getElementById("resultsSection").style.display !== "none") {
                    tinhChiPhi();
                }
            });
        });

        // Initialize with default calculation
        document.addEventListener('DOMContentLoaded', () => {
            tinhChiPhi();
        });
    </script>
</body>
</html>