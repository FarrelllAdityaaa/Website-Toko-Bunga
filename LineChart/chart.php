<?php
// Koneksi ke database
$koneksi = mysqli_connect("localhost", "root", "", "sunnyco");

if (!$koneksi) {
    die("Connection failed: " . mysqli_connect_error());
}

// Query untuk mendapatkan jumlah barang terjual per bulan
$query = "
SELECT 
DATE_FORMAT(created_at, '%Y-%m') AS month,
SUM(total_quantity) AS total_sold
FROM orders
GROUP BY month
ORDER BY month;

";

$result = mysqli_query($koneksi, $query);

$monthNames = [
    "01" => "Januari", "02" => "Februari", "03" => "Maret", "04" => "April",
    "05" => "Mei", "06" => "Juni", "07" => "Juli", "08" => "Agustus",
    "09" => "September", "10" => "Oktober", "11" => "November", "12" => "Desember"
];

// Inisialisasi semua bulan dengan nilai 0
$months = [];
$sales = [];

for ($i = 1; $i <= 12; $i++) {
    $monthNum = str_pad($i, 2, "0", STR_PAD_LEFT);
    $months[$monthNum] = $monthNames[$monthNum] . " " . date('Y'); // Contoh: January 2023
    $sales[$monthNum] = 0;
}

// Isi data yang ada dari hasil query
while ($row = mysqli_fetch_assoc($result)) {
    $month = substr($row['month'], 5, 2); // Mengambil bulan (mm) dari format yyyy-mm
    $sales[$month] = $row['total_sold'];
}

// Mengubah format array untuk digunakan di Chart.js
$chartLabels = array_values($months);
$chartData = array_values($sales);

mysqli_close($koneksi);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
    <canvas id="salesChart" width="140" height="60" class=" align-content-center"></canvas>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Data dari PHP
            const months = <?php echo json_encode($chartLabels); ?>;
            const sales = <?php echo json_encode($chartData); ?>;

            // Buat chart
            const ctx = document.getElementById('salesChart').getContext('2d');
            const salesChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: months,
                    datasets: [{
                        label: 'Jumlah Barang Terjual per Bulan',
                        data: sales,
                        borderColor: 'rgba(255, 53, 164, 1)',
                        backgroundColor: 'rgba(255, 155, 222, 0.2)',
                        borderWidth: 1.3
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                color: 'default',
                                font: {
                                    size: 14
                                }
                            },

                            grid: {
                                color: 'rgba(0, 0, 0, 0.5)' // Warna garis grid sumbu Y
                            }

                        },

                        x: {
                            ticks: {
                                color: 'default',
                                font: {
                                    size: 14
                                }
                            },
                            grid: {
                                color: 'rgba(0, 0, 0, 0.5)' // Warna garis grid sumbu X
                            }
                        }
                    },
                    plugins: {
                        legend: {
                            labels: {
                                color: 'rgba(0,0,0,0.6)',
                                font: {
                                    size: 15
                                }
                            }
                        },
                        title: {
                            display: true,
                            text: 'Jumlah Barang Terjual Sunny.co',
                            font: {
                                size: 26 // Ukuran font judul chart
                            },
                            color: 'black'
                        }
                    }
                }
            });
        });
    </script>
</body>

</html>