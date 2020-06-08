<?php 
    if(!isset($_GET['lang'])) header("Location: ?lang=EN");
    require_once __DIR__."/conf.php"; 
?>

<header>
    <div id="nav" class="u-full-width">
        <div id="left">
            <a href="/final_zadanie/?lang=<?php echo $_GET['lang']?>">
                <button><?php echo DOMOV?></button>
            </a>
        </div>
        <div id="right">
            <a href="?lang=SK"><button>SK</button></a>
            <a href="?lang=EN"><button>EN</button></a>
        </div>
    </div>
</header>
