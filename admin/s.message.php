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

    <!-- Message section starts -->
    <section>
        <h1 class="heading"><span>Sunny</span> Message</h1>
    </section>
    <section class="message" id="message">
        <div class="row">
            <?php
            $result = mysqli_query($koneksi, "SELECT * FROM pesan");
            while ($row = mysqli_fetch_assoc($result)) {
            ?>
                <div class="mess">
                    <div class="m-mess">
                        <p class="m-icons">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="23" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
                                <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1zm13 2.383-4.708 2.825L15 11.105zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741M1 11.105l4.708-2.897L1 5.383z" />
                            </svg>
                        </p>
                        <h3>MESSAGE <?= $row['id']; ?></h3>
                    </div>
                    <div>
                        <h5>Name: <span><?= $row['m_nama']; ?></span></h5>
                    </div>
                    <div>
                        <h5>Email: <span><?= $row['m_email']; ?></span></h5>
                    </div>
                    <div>
                        <h5>Number: <span><?= $row['m_number']; ?></span></h5>
                    </div>
                    <div>
                        <h5>Message:</h5>
                        <div class="m-text">
                            <p>
                                <?= $row['m_pesan']; ?>
                            </p>
                        </div>
                    </div>
                    <a href="proses/delete.message.php?id=<?= $row['id']; ?>" class="btn" onclick="return confirm('Apakah Anda Ingin Menghapus Pesan Ini?')">
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
    <!-- Message section ends -->

    <!--footer section starts-->
    <br><br><br><br><br><br><br><br><br><br>
    <?php
    include 'footer.php';
    ?>

    <!--footer section ends-->
</body>

</html>