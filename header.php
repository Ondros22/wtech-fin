<?php 
    if(!isset($_GET['lang'])) header("Location: ?lang=EN");
    require_once __DIR__."/conf.php"; 
?>
<header class="navbar navbar-expand-sm navbar-dark dark">
    <div class="container">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="/final_zadanie/dokumentacia?lang=<?php echo $_GET['lang']?>"><?php echo DOCUMENTATION; ?></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/final_zadanie/statistika?lang=<?php echo $_GET['lang']?>"><?php echo STATISTICS; ?></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/final_zadanie/calcul?lang=<?php echo $_GET['lang']?>"><?php echo CALCULATOR; ?></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/final_zadanie/logs.php?lang=<?php echo $_GET['lang']?>"><?php echo LOGS; ?></a>
            </li>
            <li class="nav-item line"></li>
            <li class="nav-item">
                <a class="nav-link" href="/final_zadanie/moricz?lang=<?php echo $_GET['lang']?>"><?php echo SUSPENSION; ?></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/final_zadanie/strba?lang=<?php echo $_GET['lang']?>"><?php echo BALL; ?></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/final_zadanie/straka?lang=<?php echo $_GET['lang']?>"><?php echo PENDULUM; ?></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/final_zadanie/pastorek?lang=<?php echo $_GET['lang']?>"><?php echo AIRPLANE; ?></a>
            </li>
        </ul>
        <ul id="language" class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="?lang=SK">SK</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="?lang=EN">EN</a>
            </li>
        </ul>
    </div>
</header>

<script>
    $(document).ready(function () {
        var language = "<?php echo strtoupper($_GET['lang']); ?>";
        if(language == "SK") $("#language .nav-link").eq(0).addClass("active");
        else if(language == "EN") $("#language .nav-link").eq(1).addClass("active");
    });
</script>

