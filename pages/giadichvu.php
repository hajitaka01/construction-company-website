<?php
// Include header và navbar
include '../includes/header.php';
include '../includes/navbar.php';
?>

<style>
    .section {
    padding: 50px 20px; /* Giảm padding trên/dưới, tăng左右 */
    background: linear-gradient(135deg, #e8edf3 0%, #d6e0f0 100%); /* Gradient nhẹ hơn */
    min-height: 100vh;
    display: flex;
    flex-direction: column;
    align-items: center;
}

.section-header {
    text-align: center;
    margin-bottom: 50px;
    animation: fadeIn 1s ease-out;
}

.section-header h2 {
    font-size: 32px; /* Giảm nhẹ font-size cho sự tinh tế */
    font-weight: 700;
    margin-bottom: 12px;
    color: #1a2634; /* Màu đậm hơn, chuyên nghiệp */
    text-transform: uppercase;
    letter-spacing: 1.5px;
    font-family: 'Inter', sans-serif; /* Font hiện đại */
}

.section-header p {
    color: #5c6b80; /* Màu xám nhẹ, dễ nhìn */
    font-size: 16px;
    max-width: 600px;
    margin: 0 auto;
}

.main-content {
    display: flex;
    gap: 24px; /* Giảm gap để gọn hơn */
    max-width: 1280px; /* Tăng chiều rộng tối đa */
    margin: 0 auto;
    animation: slideUp 1s ease-out;
}

.left-panel, .right-panel {
    flex: 1;
    background: #ffffff;
    border-radius: 12px;
    box-shadow: 0 8px 24px rgba(0, 0, 0, 0.08); /* Shadow mềm hơn */
    padding: 24px;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.left-panel:hover, .right-panel:hover {
    transform: translateY(-4px);
    box-shadow: 0 12px 32px rgba(0, 0, 0, 0.12); /* Hiệu ứng nổi khi hover */
}

.calculator-table {
    width: 100%;
    border-collapse: separate;
    border-spacing: 0 10px; /* Giảm spacing cho gọn */
}

.calculator-table th {
    padding: 14px 16px;
    background: #1a2634; /* Màu đậm hơn, chuyên nghiệp */
    color: #ffffff;
    font-weight: 600;
    text-align: left;
    border-radius: 6px 6px 0 0;
}

.calculator-table td {
    padding: 12px 16px;
    vertical-align: middle;
    background: #f9fafb; /* Nền nhẹ cho hàng */
    border-radius: 6px;
}

.section-header td {
    background: #3b82f6; /* Màu xanh sáng hơn */
    color: #ffffff;
    text-align: center;
    border-radius: 6px;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 1.2px;
    padding: 12px;
}

.floors-dropdown {
    width: 100%;
    padding: 10px 12px;
    border: 1px solid #d1d9e6; /* Viền nhẹ hơn */
    border-radius: 6px;
    background: #ffffff;
    font-size: 14px;
    transition: border-color 0.3s, box-shadow 0.3s;
}

.floors-dropdown:focus {
    border-color: #3b82f6;
    box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
    outline: none;
}

.floor-controls {
    display: flex;
    gap: 6px;
    align-items: center;
}

.btn-adjust {
    background: #3b82f6;
    color: #ffffff;
    border: none;
    border-radius: 6px;
    width: 32px;
    height: 32px;
    cursor: pointer;
    transition: background 0.3s, transform 0.3s;
    font-size: 14px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.btn-adjust:hover {
    background: #2563eb;
    transform: scale(1.05);
}

.area-input {
    width: 70px; /* Thu nhỏ input */
    text-align: center;
    padding: 8px;
    border: 1px solid #d1d9e6;
    border-radius: 6px;
    font-size: 14px;
    font-weight: 500;
    transition: border-color 0.3s, box-shadow 0.3s;
}

.area-input:focus {
    border-color: #3b82f6;
    box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
    outline: none;
}

.coefficient-display {
    font-weight: 600;
    color: #dc2626; /* Màu đỏ sáng hơn */
    font-size: 14px;
}

.calculated-area {
    font-weight: 600;
    color: #16a34a; /* Màu xanh lá tươi hơn */
    font-size: 14px;
}

.reset-btn {
    width: 100%;
    padding: 12px;
    background: #dc2626;
    color: #ffffff;
    border: none;
    border-radius: 6px;
    cursor: pointer;
    transition: background 0.3s, transform 0.3s;
    font-size: 14px;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 1px;
    margin: 16px 0;
}

.reset-btn:hover {
    background: #b91c1c;
    transform: translateY(-2px);
}

.diagram-container {
    width: 100%;
    height: 480px; /* Tăng chiều cao cho rõ ràng */
    border: 1px solid #e5e7eb; /* Viền nhẹ hơn */
    border-radius: 12px;
    overflow: hidden;
    margin-bottom: 24px;
    background: #ffffff; /* Nền trắng sạch */
    position: relative;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
}

.diagram-container svg {
    font-family: 'Inter', sans-serif;
    width: 100%;
    height: 100%;
}

.diagram-container text {
    font-size: 12px;
    font-weight: 500;
    fill: #1a2634;
    text-shadow: 0 0 4px rgba(255, 255, 255, 0.9); /* Tăng độ mờ */
    pointer-events: none;
}

.diagram-container rect, .diagram-container path {
    transition: fill 0.3s ease, stroke 0.3s ease;
}

.section-title {
    font-size: 22px;
    font-weight: 700;
    color: #1a2634;
    margin-bottom: 16px;
    padding-bottom: 8px;
    border-bottom: 2px solid #3b82f6; /* Viền xanh mỏng hơn */
}

.price-table {
    margin-top: 32px;
    background: #ffffff;
    border-radius: 12px;
    box-shadow: 0 8px 24px rgba(0, 0, 0, 0.08);
    overflow: hidden;
}

.price-table th {
    background: #1a2634;
    color: #ffffff;
    padding: 14px 16px;
    font-weight: 600;
    font-size: 14px;
}

.price-table td {
    padding: 14px 16px;
    border-bottom: 1px solid #e5e7eb;
    font-size: 14px;
}

.price-table tr:hover {
    background: #f3f4f6; /* Nền hover nhẹ */
}

#totalArea, #areaNhaPho, #areaBietThu {
    color: #16a34a;
    font-weight: 600;
}

#totalNhaPho, #totalBietThu {
    color: #dc2626;
    font-weight: 600;
}

.formula-note {
    background: #f9fafb;
    padding: 16px;
    border-radius: 8px;
    margin-top: 16px;
    border-left: 4px solid #3b82f6;
    font-size: 14px;
}

.formula-note strong {
    color: #1a2634;
    display: block;
    margin-bottom: 8px;
    font-size: 15px;
}

.total-row {
    background: #f3f4f6;
    font-size: 16px;
}

.total-row td {
    padding: 14px 16px !important;
    text-align: center;
}

#totalArea {
    color: #dc2626;
    font-size: 18px;
    font-weight: 700;
}

input[type="checkbox"] {
    width: 16px;
    height: 16px;
    margin-right: 8px;
    vertical-align: middle;
    accent-color: #3b82f6; /* Màu checkbox */
}

td:first-child {
    font-weight: 600;
    color: #1a2634;
}

.calculator-table tr:not(.section-header):hover {
    background: #f3f4f6;
}

@keyframes fadeIn {
    from { opacity: 0; }
    to { opacity: 1; }
}

@keyframes slideUp {
    from { 
        opacity: 0;
        transform: translateY(24px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Responsive adjustments */
@media (max-width: 1024px) {
    .main-content {
        gap: 20px;
    }

    .left-panel, .right-panel {
        padding: 20px;
    }
}

@media (max-width: 768px) {
    .section {
        padding: 40px 16px;
    }

    .main-content {
        flex-direction: column;
        gap: 16px;
    }

    .section-header h2 {
        font-size: 24px;
    }

    .calculator-table td {
        padding: 10px;
    }

    .area-input {
        width: 60px;
        font-size: 13px;
    }

    .btn-adjust {
        width: 28px;
        height: 28px;
        font-size: 13px;
    }

    .floors-dropdown {
        font-size: 13px;
    }

    .diagram-container {
        height: 360px;
    }

    .diagram-container text {
        font-size: 10px;
    }

    .section-title {
        font-size: 20px;
    }

    td:first-child {
        white-space: normal;
        font-size: 13px;
    }
}

@media (max-width: 480px) {
    .section-header h2 {
        font-size: 20px;
        letter-spacing: 1px;
    }

    .calculator-table {
        border-spacing: 0 8px;
    }

    .floor-controls {
        flex-wrap: wrap;
        gap: 4px;
    }

    .reset-btn {
        font-size: 13px;
        padding: 10px;
    }
}
</style>

<!-- Main Content -->
<section class="section">
    <div class="container">
        <header class="section-header" data-aos="fade-up">
            <h2>Chọn Cấu Trúc Nhà</h2>
            <p>Tùy chỉnh cấu trúc nhà của bạn và nhận dự toán chi phí chi tiết</p>
        </header>

        <div class="main-content">
            <article class="left-panel">
                <table class="calculator-table">
                    <tbody>
                        <!-- Nhóm: Cấu hình tầng -->
                        <tr class="group-header">
                            <td colspan="4">Cấu Hình Tầng</td>
                        </tr>
                        <tr class="group-section">
                            <td>Số tầng (bao gồm tầng trệt):</td>
                            <td colspan="3">
                                <select id="floorsSelect" class="floors-dropdown" onchange="updateFloors()">
                                    <option value="1">1 tầng</option>
                                    <option value="2">2 tầng</option>
                                    <option value="3">3 tầng</option>
                                    <option value="4">4 tầng</option>
                                    <option value="5">5 tầng</option>
                                    <option value="6">6 tầng</option>
                                    <option value="7">7 tầng</option>
                                    <option value="8">8 tầng</option>
                                    <option value="9">9 tầng</option>
                                    <option value="10">10 tầng</option>
                                    <option value="11">11 tầng</option>
                                    <option value="12">12 tầng</option>
                                </select>
                            </td>
                        </tr>
                        
                        <!-- Tầng trệt -->
                        <tr id="groundRow" class="group-section">
                            <td>Tầng trệt:</td>
                            <td class="floor-controls input-group">
                                <button class="btn-adjust" onclick="adjustArea('ground', -5)">-</button>
                                <input type="number" id="groundArea" class="area-input" value="70" min="10" onchange="calculateAll()">
                                <button class="btn-adjust" onclick="adjustArea('ground', 5)">+</button>
                            </td>
                            <td>Hệ số:</td>
                            <td>
                                <span class="coefficient-display">100%</span> = 
                                <span id="groundCalculated" class="calculated-area">70</span> m²
                            </td>
                        </tr>
                        <tr id="groundBalconyRow" class="group-section checkbox-group">
                            <td colspan="4">
                                <label class="checkbox-label">
                                    <input type="checkbox" id="groundBalcony" onchange="toggleBalcony('ground')"> Có ban công
                                </label>
                                <div id="groundBalconyControls" class="input-group" style="display: none;">
                                    <button class="btn-adjust" onclick="adjustArea('groundBalcony', -5)">-</button>
                                    <input type="number" id="groundBalconyArea" class="area-input" value="10" min="0" onchange="calculateAll()">
                                    <button class="btn-adjust" onclick="adjustArea('groundBalcony', 5)">+</button>
                                </div>
                            </td>
                        </tr>

                        <!-- Nhóm: Tum & Sân thượng -->
                        <tr class="group-header">
                            <td colspan="4">Tum & Sân Thượng</td>
                        </tr>
                        <tr id="tumRow" class="group-section">
                            <td colspan="4">
                                <label class="checkbox-label">
                                    <input type="checkbox" id="hasTum" onchange="toggleTum()"> Có Tum
                                </label>
                                <div id="tumControls" style="display: none;">
                                    <div class="group-section">
                                        <td>Tum:</td>
                                        <td class="floor-controls input-group">
                                            <button class="btn-adjust" onclick="adjustArea('tum', -5)">-</button>
                                            <input type="number" id="tumArea" class="area-input" value="30" min="0" onchange="calculateAll()">
                                            <button class="btn-adjust" onclick="adjustArea('tum', 5)">+</button>
                                        </td>
                                        <td>Hệ số:</td>
                                        <td>
                                            <span class="coefficient-display">100%</span> = 
                                            <span id="tumCalculated" class="calculated-area">30</span> m²
                                        </td>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr id="rooftopRow" class="group-section" style="display: none;">
                            <td>Sân thượng:</td>
                            <td class="floor-controls input-group">
                                <input type="number" id="rooftopArea" class="area-input" value="40" readonly>
                            </td>
                            <td>Hệ số:</td>
                            <td>
                                <span class="coefficient-display">50%</span> = 
                                <span id="rooftopCalculated" class="calculated-area">20</span> m²
                            </td>
                        </tr>

                        <!-- Nhóm: Móng, Mái & Tầng hầm -->
                        <tr class="group-header">
                            <td colspan="4">Móng, Mái & Tầng Hầm</td>
                        </tr>
                        <tr class="group-section">
                            <td>Hệ mái:</td>
                            <td colspan="3">
                                <select id="roofType" class="floors-dropdown" onchange="calculateAll()">
                                    <option value="tole">Mái tole (35%)</option>
                                    <option value="tile">Mái ngói (75%)</option>
                                    <option value="slope">Mái xiên (150%)</option>
                                </select>
                            </td>
                        </tr>
                        <tr class="group-section">
                            <td>Móng và nền:</td>
                            <td colspan="3">
                                <select id="foundationType" class="floors-dropdown" onchange="calculateAll()">
                                    <option value="simple">Móng đơn (35%)</option>
                                    <option value="complex">Móng băng/cọc/bè (50%)</option>
                                    <option value="concrete">Móng băng + nền bê tông (65%)</option>
                                </select>
                            </td>
                        </tr>
                        <tr class="group-section">
                            <td>Tầng hầm:</td>
                            <td colspan="3">
                                <select id="basementType" class="floors-dropdown" onchange="calculateAll()">
                                    <option value="none">Không có</option>
                                    <option value="half">Bán hầm (150%)</option>
                                    <option value="full1">Hầm tầng 1 (150%)</option>
                                    <option value="full2">Hầm tầng 2 (200%)</option>
                                </select>
                            </td>
                        </tr>

                        <tr class="group-section">
                            <td colspan="4">
                                <button class="reset-btn" onclick="resetDefault()">Reset Mặc Định</button>
                            </td>
                        </tr>
                        <tr class="total-row">
                            <td colspan="4">
                                <strong>Tổng diện tích quy đổi: <span id="totalArea">0</span> m²</strong>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </article>
            
            <article class="right-panel">
                <div id="buildingDiagram" class="diagram-container"></div>
                <h3 class="section-title">Cách Tính Hệ Số Xây Dựng</h3>
                
                <div class="formula-group">
                    <strong>Móng và công trình ngầm:</strong>
                    <ul>
                        <li>Móng đơn: 30% diện tích sàn trệt</li>
                        <li>Móng băng, móng cọc, móng bè: 50% (nếu có đổ bê tông nền trệt: 65%)</li>
                    </ul>
                </div>
                
                <div class="formula-group">
                    <strong>Tầng hầm:</strong> (tính riêng với phần móng)
                    <ul>
                        <li>Sâu dưới 1.2m so với cốt vỉa hè: 150%</li>
                        <li>Sâu trên 1.2m so với cốt vỉa hè: 170%</li>
                        <li>Sâu trên 1.8m so với cốt vỉa hè: 200%</li>
                    </ul>
                </div>
                
                <div class="formula-group">
                    <strong>Trệt, các lầu và tum thang tĩnh:</strong> 100% diện tích
                </div>
                
                <div class="formula-group">
                    <strong>Ô thông tầng:</strong> Dưới 8m², khu vực cầu thang tĩnh như sàn bình thường / Trên 8m² tính 50%
                </div>
                
                <div class="formula-group">
                    <strong>Sân thượng:</strong> 50%
                </div>
                
                <div class="formula-group">
                    <strong>Mái:</strong>
                    <ul>
                        <li>Mái tole: 35% (nhân hệ số nghiêng)</li>
                        <li>Mái bê tông cốt thép đúc bằng, mái ngói xá gỗ sắt: 50% (nhân hệ số nghiêng)</li>
                        <li>Mái xiên bê tông dân ngụ tĩnh: 75% (nhân hệ số nghiêng)</li>
                    </ul>
                </div>
                
                <div class="formula-group">
                    <strong>Sân trước và sân sau:</strong> 50% - 70% diện tích
                </div>
                
                <div class="formula-note">
                    * Các hệ số được áp dụng theo quy định hiện hành về xây dựng
                </div>
            </article>
        </div>

        <article class="container price-section" style="margin-top: 40px;">
            <h3 class="section-title">Đơn Giá (Miễn Phí Thiết Kế)</h3>
            <table class="price-table">
                <thead>
                    <tr>
                        <th>Phân loại</th>
                        <th>Đơn giá đ/m²</th>
                        <th>Tổng diện tích (m²)</th>
                        <th>Thành tiền</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Nhà phố liền kề</td>
                        <td id="priceNhaPho">4,200,000</td>
                        <td id="areaNhaPho">—</td>
                        <td id="totalNhaPho">—</td>
                    </tr>
                    <tr>
                        <td>Biệt thự</td>
                        <td id="priceBietThu">5,500,000</td>
                        <td id="areaBietThu">—</td>
                        <td id="totalBietThu">—</td>
                    </tr>
                    <tr>
                        <td>Công trình khác</td>
                        <td>Thỏa thuận</td>
                        <td>—</td>
                        <td>Thỏa thuận</td>
                    </tr>
                </tbody>
            </table>

            <div class="formula-note">
                <strong>Lưu ý:</strong><br>
                A. Cung cấp cả Nhân công và Vật tư phần thô.<br>
                B. Tiếp tục cung cấp Nhân công đến lúc hoàn thiện nhà.<br>
                C. Vật tư hoàn thiện chiếm khoảng 40–70% giá trị phần thô.
            </div>
        </article>
    </div>
</section>

<?php include '../includes/footer.php'; ?>

<script>
    // Cập nhật hằng số
    const FLOOR_COEFFICIENT = 1.0; // 100%
    const ROOFTOP_COEFFICIENT = 0.5; // 50%
    const FOUNDATION_COEFFICIENTS = {
        'simple': 0.35,    // 35% for simple foundation
        'complex': 0.5,    // 50% for complex foundation
        'concrete': 0.65   // 65% for concrete foundation
    };
    const ROOF_COEFFICIENTS = {
        'tole': 0.35,      // 35% for metal roof
        'tile': 0.75,      // 75% for tile roof
        'slope': 1.5       // 150% for sloped roof
    };
    const BASEMENT_COEFFICIENTS = {
        'none': 0,
        'half': 1.5,       // 150% for semi-basement
        'full1': 1.5,      // 150% for 1st basement
        'full2': 2.0       // 200% for 2nd basement
    };

    // Global variables
    let floorAreas = new Array(12).fill(70); // Default 70m2 for each floor
    let balconyAreas = new Array(12).fill(0); // Default 0m2 for balconies

    function toggleBalcony(floor) {
        const controls = document.getElementById(`${floor}BalconyControls`);
        const checkbox = document.getElementById(`${floor}Balcony`);
        controls.style.display = checkbox.checked ? 'block' : 'none';
        calculateAll();
    }

    function toggleTum() {
        const hasTum = document.getElementById('hasTum').checked;
        document.getElementById('tumControls').style.display = hasTum ? 'table-row' : 'none';
        document.getElementById('rooftopRow').style.display = hasTum ? 'table-row' : 'none';
        calculateAll();
    }

    function updateFloors() {
        const floors = parseInt(document.getElementById('floorsSelect').value);
        
        // Always show ground floor and its balcony option
        document.getElementById('groundRow').style.display = 'table-row';
        document.getElementById('groundBalconyRow').style.display = 'table-row';
        document.getElementById('tumRow').style.display = 'table-row';
        
        // Update floor inputs
        for (let i = 1; i < floors; i++) {
            const floorNum = i + 1;
            const rowId = `floor${floorNum}Row`;
            const balconyRowId = `floor${floorNum}BalconyRow`;
            
            // Create floor row if doesn't exist
            if (!document.getElementById(rowId)) {
                const row = document.createElement('tr');
                row.id = rowId;
                row.innerHTML = `
                    <td>Sàn ${floorNum} (Lầu ${i}):</td>
                    <td class="floor-controls">
                        <button class="btn-adjust" onclick="adjustArea('floor${floorNum}', -5)">-</button>
                        <input type="number" id="floor${floorNum}Area" class="area-input" value="${floorAreas[i]}" onchange="calculateAll()">
                        <button class="btn-adjust" onclick="adjustArea('floor${floorNum}', 5)">+</button>
                    </td>
                    <td>Hệ số:</td>
                    <td><span class="coefficient-display">100%</span> = <span id="floor${floorNum}Calculated" class="calculated-area">${floorAreas[i].toFixed(1)}</span></td>
                `;
                const tumRow = document.getElementById('tumRow');
                tumRow.parentNode.insertBefore(row, tumRow);
            } else {
                document.getElementById(rowId).style.display = 'table-row';
                const areaInput = document.getElementById(`floor${floorNum}Area`);
                if (areaInput && !areaInput.value) {
                    areaInput.value = floorAreas[i];
                }
                const calculatedSpan = document.getElementById(`floor${floorNum}Calculated`);
                if (calculatedSpan) {
                    calculatedSpan.textContent = parseFloat(areaInput.value || floorAreas[i]).toFixed(1);
                }
            }

            // Create balcony row if doesn't exist
            if (!document.getElementById(balconyRowId)) {
                const balconyRow = document.createElement('tr');
                balconyRow.id = balconyRowId;
                balconyRow.innerHTML = `
                    <td colspan="4">
                        <label>
                            <input type="checkbox" id="floor${floorNum}Balcony" onchange="toggleBalcony('floor${floorNum}')"> Có ban công
                        </label>
                        <div id="floor${floorNum}BalconyControls" style="display: none;">
                            <button class="btn-adjust" onclick="adjustArea('floor${floorNum}Balcony', -5)">-</button>
                            <input type="number" id="floor${floorNum}BalconyArea" class="area-input" value="10" onchange="calculateAll()">
                            <button class="btn-adjust" onclick="adjustArea('floor${floorNum}Balcony', 5)">+</button>
                        </div>
                    </td>
                `;
                const tumRow = document.getElementById('tumRow');
                tumRow.parentNode.insertBefore(balconyRow, tumRow);
            } else {
                document.getElementById(balconyRowId).style.display = 'table-row';
            }
        }
        
        // Hide unused floor and balcony rows
        for (let i = floors; i <= 12; i++) {
            const row = document.getElementById(`floor${i}Row`);
            const balconyRow = document.getElementById(`floor${i}BalconyRow`);
            if (row) row.style.display = 'none';
            if (balconyRow) balconyRow.style.display = 'none';
        }
        
        toggleTum();
        calculateAll();
        updateDiagram();
    }

    function adjustArea(floor, change) {
        const input = document.getElementById(`${floor}Area`);
        let value = parseFloat(input.value) || (floor.includes('Balcony') ? 10 : 70);
        value = Math.max(0, value + change); // Minimum 0m2 for balcony, 10m2 for floors
        input.value = value;
        calculateAll();
    }

    function calculateAll() {
        const floors = parseInt(document.getElementById('floorsSelect').value);
        let totalArea = 0;
        
        // Calculate ground floor + balcony
        const groundArea = parseFloat(document.getElementById('groundArea').value) || 0;
        const groundBalconyArea = document.getElementById('groundBalcony').checked ? 
            parseFloat(document.getElementById('groundBalconyArea').value) || 0 : 0;
        const groundTotal = (groundArea + groundBalconyArea) * FLOOR_COEFFICIENT;
        document.getElementById('groundCalculated').textContent = groundTotal.toFixed(1);
        totalArea += groundTotal;
        
        // Calculate additional floors + balconies
        for (let i = 1; i < floors; i++) {
            const floorNum = i + 1;
            const floorArea = parseFloat(document.getElementById(`floor${floorNum}Area`)?.value) || 0;
            const balconyArea = document.getElementById(`floor${floorNum}Balcony`)?.checked ? 
                parseFloat(document.getElementById(`floor${floorNum}BalconyArea`)?.value) || 0 : 0;
            const floorTotal = (floorArea + balconyArea) * FLOOR_COEFFICIENT;
            const calculatedElement = document.getElementById(`floor${floorNum}Calculated`);
            if (calculatedElement) {
                calculatedElement.textContent = floorTotal.toFixed(1);
            }
            totalArea += floorTotal;
        }

        // Calculate tum
        const hasTum = document.getElementById('hasTum').checked;
        let tumArea = 0;
        if (hasTum) {
            tumArea = parseFloat(document.getElementById('tumArea').value) || 0;
            const tumCalculated = tumArea * FLOOR_COEFFICIENT;
            document.getElementById('tumCalculated').textContent = tumCalculated.toFixed(1);
            totalArea += tumCalculated;
        }

        // Calculate rooftop area (based on topmost floor minus tum)
        const topFloorArea = floors > 1 ? 
            (parseFloat(document.getElementById(`floor${floors}Area`)?.value) || 70) + 
            (document.getElementById(`floor${floors}Balcony`)?.checked ? 
                parseFloat(document.getElementById(`floor${floors}BalconyArea`)?.value) || 0 : 0) : 
            groundArea + groundBalconyArea;
        const rooftopArea = hasTum ? Math.max(0, topFloorArea - tumArea) : 0;
        document.getElementById('rooftopArea').value = rooftopArea.toFixed(1);
        const rooftopCalculated = rooftopArea * ROOFTOP_COEFFICIENT;
        document.getElementById('rooftopCalculated').textContent = rooftopCalculated.toFixed(1);
        totalArea += rooftopCalculated;

        // Add basement
        const basementType = document.getElementById('basementType').value;
        totalArea += groundArea * BASEMENT_COEFFICIENTS[basementType];
        
        // Add foundation
        const foundationType = document.getElementById('foundationType').value;
        totalArea += groundArea * FOUNDATION_COEFFICIENTS[foundationType];
        
        // Add roof
        const roofType = document.getElementById('roofType').value;
        totalArea += groundArea * ROOF_COEFFICIENTS[roofType];
        
        // Update total area
        document.getElementById('totalArea').textContent = totalArea.toFixed(1);

        // Update price table
        document.getElementById('areaNhaPho').textContent = totalArea.toFixed(1);
        const priceNhaPho = 4200000 * totalArea;
        document.getElementById('totalNhaPho').textContent = new Intl.NumberFormat('vi-VN').format(priceNhaPho);

        document.getElementById('areaBietThu').textContent = totalArea.toFixed(1);
        const priceBietThu = 5500000 * totalArea;
        document.getElementById('totalBietThu').textContent = new Intl.NumberFormat('vi-VN').format(priceBietThu);
        
        updateDiagram();
    }

    function updateDiagram() {
        const floors = parseInt(document.getElementById('floorsSelect').value);
        const container = document.getElementById('buildingDiagram');
        const width = container.clientWidth;
        const height = container.clientHeight;
        const margin = 50; // Tăng margin để có không gian cho text
        const floorHeight = Math.min(60, (height - 200) / (floors + 3)); // Tăng khoảng cách tầng
        
        let svg = `<svg width="${width}" height="${height}" viewBox="0 0 ${width} ${height}">`;
        const baseY = height - margin;
        const maxFloorWidth = width - 2 * margin;
        const balconyWidth = maxFloorWidth * 0.15; // Giảm tỷ lệ ban công để gọn hơn
        
        // Draw foundation
        svg += `
            <rect x="${margin}" y="${baseY}" width="${maxFloorWidth}" height="8" 
                fill="#95a5a6" stroke="#2c3e50" stroke-width="2"/>
            <rect x="${margin + maxFloorWidth/3}" y="${baseY + 8}" width="${maxFloorWidth/3}" height="20" 
                fill="#7f8c8d" stroke="#2c3e50" stroke-width="2"/>
            <text x="${width/2}" y="${baseY + 40}" text-anchor="middle" fill="#2c3e50" font-size="14">
                Móng = ${document.getElementById('groundArea').value}m²
            </text>
        `;
        
        // Draw floors and balconies
        for (let i = 0; i < floors; i++) {
            const y = baseY - ((i + 1) * floorHeight) - 30;
            const floorArea = i === 0 ? 
                parseFloat(document.getElementById('groundArea').value) : 
                parseFloat(document.getElementById(`floor${i+1}Area`)?.value) || 70;
            const balconyArea = i === 0 ? 
                (document.getElementById('groundBalcony').checked ? 
                    parseFloat(document.getElementById('groundBalconyArea').value) || 0 : 0) :
                (document.getElementById(`floor${i+1}Balcony`)?.checked ? 
                    parseFloat(document.getElementById(`floor${i+1}BalconyArea`)?.value) || 0 : 0);
            
            // Draw floor
            svg += `
                <rect x="${margin}" y="${y}" width="${maxFloorWidth}" height="${floorHeight-8}"
                    fill="#ffffff" stroke="#2c3e50" stroke-width="2"/>
                <line x1="${margin + 15}" y1="${y + (floorHeight-8)/2}" x2="${width-margin-15-balconyWidth}" y2="${y + (floorHeight-8)/2}"
                    stroke="#2c3e50" stroke-width="1" stroke-dasharray="3,3"/>
                <text x="${margin + 10}" y="${y + (floorHeight-8)/2}" text-anchor="start" dominant-baseline="middle"
                    fill="#2c3e50" font-size="12">Sàn ${i === 0 ? 'trệt' : i + 1} = ${floorArea + balconyArea}m²</text>
            `;
            
            // Draw balcony if exists
            if (balconyArea > 0) {
                svg += `
                    <rect x="${margin + maxFloorWidth}" y="${y}" width="${balconyWidth}" height="${floorHeight-8}"
                        fill="#dfe6e9" stroke="#2c3e50" stroke-width="2" stroke-dasharray="3,3"/>
                    <text x="${width-margin-5}" y="${y + (floorHeight-8)/2}" text-anchor="end" dominant-baseline="middle"
                        fill="#2c3e50" font-size="10">Ban công = ${balconyArea}m²</text>
                `;
            }
        }
        
        // Draw tum and rooftop
        const topY = baseY - (floors * floorHeight) - 30;
        const hasTum = document.getElementById('hasTum').checked;
        const tumArea = hasTum ? parseFloat(document.getElementById('tumArea').value) || 0 : 0;
        const topFloorArea = floors > 1 ? 
            (parseFloat(document.getElementById(`floor${floors}Area`)?.value) || 70) + 
            (document.getElementById(`floor${floors}Balcony`)?.checked ? 
                parseFloat(document.getElementById(`floor${floors}BalconyArea`)?.value) || 0 : 0) : 
            parseFloat(document.getElementById('groundArea').value) + 
            (document.getElementById('groundBalcony').checked ? 
                parseFloat(document.getElementById('groundBalconyArea').value) || 0 : 0);
        const rooftopArea = hasTum ? Math.max(0, topFloorArea - tumArea) : 0;
        
        if (hasTum && (tumArea > 0 || rooftopArea > 0)) {
            const totalTopArea = tumArea + rooftopArea;
            const tumWidth = totalTopArea > 0 ? maxFloorWidth * (tumArea / totalTopArea) : maxFloorWidth / 2;
            const rooftopWidth = totalTopArea > 0 ? maxFloorWidth * (rooftopArea / totalTopArea) : maxFloorWidth / 2;
            
            if (tumArea > 0) {
                svg += `
                    <rect x="${margin}" y="${topY - floorHeight}" 
                        width="${tumWidth}" height="${floorHeight-8}"
                        fill="#ffffff" stroke="#2c3e50" stroke-width="2"/>
                    <text x="${margin + tumWidth - 5}" y="${topY - floorHeight/2}" text-anchor="end" dominant-baseline="middle"
                        fill="#2c3e50" font-size="12">Tum = ${tumArea}m²</text>
                `;
            }
            
            if (rooftopArea > 0) {
                svg += `
                    <rect x="${margin + tumWidth}" y="${topY - floorHeight}" 
                        width="${rooftopWidth}" height="${floorHeight-8}"
                        fill="#ecf0f1" stroke="#2c3e50" stroke-width="2" stroke-dasharray="4,4"/>
                    <text x="${width-margin-5}" y="${topY - floorHeight/2}" text-anchor="end" dominant-baseline="middle"
                        fill="#2c3e50" font-size="12">Sân thượng = ${rooftopArea}m²</text>
                `;
            }
        }
        
        // Draw roof
        const roofType = document.getElementById('roofType').value;
        const roofY = topY - floorHeight;
        const roofArea = parseFloat(document.getElementById('groundArea').value) * ROOF_COEFFICIENTS[roofType];
        const roofHeight = roofType === 'slope' ? 80 : 50;
        
        if (roofType === 'tole') {
            svg += `
                <path d="M ${margin} ${roofY} L ${width/2} ${roofY-roofHeight} L ${width-margin} ${roofY} Z"
                    fill="#95a5a6" stroke="#2c3e50" stroke-width="2"/>
                <text x="${width/2}" y="${roofY-10}" text-anchor="middle" fill="#ffffff" font-size="14">
                    Mái tole = ${roofArea.toFixed(1)}m²
                </text>
            `;
        } else if (roofType === 'tile') {
            svg += `
                <path d="M ${margin} ${roofY} L ${width/2} ${roofY-roofHeight} L ${width-margin} ${roofY} Z"
                    fill="#e17055" stroke="#2c3e50" stroke-width="2"/>
                <text x="${width/2}" y="${roofY-10}" text-anchor="middle" fill="#ffffff" font-size="14">
                    Mái ngói = ${roofArea.toFixed(1)}m²
                </text>
            `;
        } else {
            svg += `
                <path d="M ${margin} ${roofY} L ${width/2} ${roofY-roofHeight} L ${width-margin} ${roofY} Z"
                    fill="#e74c3c" stroke="#2c3e50" stroke-width="2"/>
                <text x="${width/2}" y="${roofY-10}" text-anchor="middle" fill="#ffffff" font-size="14">
                    Mái xiên = ${roofArea.toFixed(1)}m²
                </text>
            `;
        }
        
        // Draw basement
        const basementType = document.getElementById('basementType').value;
        if (basementType !== 'none') {
            const basementHeight = basementType === 'full2' ? 80 : 50;
            svg += `
                <rect x="${margin + maxFloorWidth/3}" y="${baseY + 28}" width="${maxFloorWidth/3}" height="${basementHeight}"
                    fill="#34495e" stroke="#2c3e50" stroke-width="2"/>
                <text x="${width/2}" y="${baseY + 28 + basementHeight/2}" text-anchor="middle" fill="#ffffff" font-size="12">
                    Tầng hầm ${basementType === 'half' ? 'bán hầm' : basementType === 'full1' ? 'tầng 1' : 'tầng 2'}
                </text>
            `;
        }
        
        svg += '</svg>';
        container.innerHTML = svg;
    }

    function resetDefault() {
        document.getElementById('floorsSelect').value = '1';
        document.getElementById('groundArea').value = '70';
        document.getElementById('groundBalcony').checked = false;
        document.getElementById('groundBalconyControls').style.display = 'none';
        document.getElementById('groundBalconyArea').value = '10';
        document.getElementById('hasTum').checked = false;
        document.getElementById('tumControls').style.display = 'none';
        document.getElementById('rooftopRow').style.display = 'none';
        document.getElementById('tumArea').value = '30';
        document.getElementById('rooftopArea').value = '40';
        document.getElementById('basementType').value = 'none';
        document.getElementById('foundationType').value = 'simple';
        document.getElementById('roofType').value = 'tole';
        updateFloors();
    }

    // Initialize on load
    window.addEventListener('load', () => {
        updateFloors();
        calculateAll();
    });
</script>