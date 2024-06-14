<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Favicon Sunny.co -->
    <link rel="icon" type="image" href="../images/favicon.png">
</head>

<body>
    <!--Header section starts-->

    <?php
    include 'header.php';
    ?>

    <!--Header section ends-->

    <!-- Customer section starts -->

    <section>
        <h1 class="heading"><span>Sunny</span> Customer</h1>
    </section>

    <section class="customer">
        <div class="c-container">
            <?php
            $result = mysqli_query($koneksi, "SELECT * FROM user");
            while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <div class="c-box">
                <div class="c-usern">
                    <p class="c-icons">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="23" fill="currentColor" class="bi bi-person-badge" viewBox="0 0 16 16">
                            <path d="M6.5 2a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1zM11 8a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
                            <path d="M4.5 0A2.5 2.5 0 0 0 2 2.5V14a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2.5A2.5 2.5 0 0 0 11.5 0zM3 2.5A1.5 1.5 0 0 1 4.5 1h7A1.5 1.5 0 0 1 13 2.5v10.795a4.2 4.2 0 0 0-.776-.492C11.392 12.387 10.063 12 8 12s-3.392.387-4.224.803a4.2 4.2 0 0 0-.776.492z" />
                        </svg>
                    </p>
                    <h3>USER <?= $row['user_id']; ?></h3>
                </div>

                <span>Name</span>
                <h2><?= $row['username']; ?></h2>

                <span>Email</span>
                <h2><?= $row['email']; ?></h2>

                <span>Phone</span>
                <h2><?= $row['nomerhp']; ?></h2>

                <a href="proses/delete.customer.php?id=<?= $row['user_id']; ?>" class="btn" onclick="return confirm('Apakah Anda Ingin Menghapus Customer Ini?')">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z" />
                        <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z" />
                    </svg>
                </a>

            </div>
            <?php
            }
            ?>
            
        </div>
    </section>

    <!-- Customer section ends -->

    <!--footer section starts-->
    <br><br><br><br><br><br><br><br><br><br>
    <?php
    include 'footer.php';
    ?>

    <!--footer section ends-->
</body>

</html>