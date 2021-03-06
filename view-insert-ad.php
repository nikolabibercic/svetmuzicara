<?php require 'instances-of-objects.php'; ?>

<?php require 'partials/header.php'; ?>

<!-- brisanje oglasa poruke -->
<?php if(isset($_GET['adInserted']) && $_GET['adInserted']==1): ?>
    <div class="messageSuccess">Oglas je uspešno kreiran.</div>
<?php endif; ?>

<?php if(isset($_GET['adInserted']) && $_GET['adInserted']==0): ?>
    <div class="messageUnsuccess">Kreiranje oglasa nije uspelo!</div>
<?php endif; ?>

<?php 
    //Ako korisnik nije ulogovan salje ga na na log in stranicu
    if(!isset($_SESSION['user'])){
        header('Location: view-log-in.php#logInForm');
    }
?>

<!-- register form -->
<section class="insertAdForm container" id="insertAdForm">
    <h2>Postavite oglas</h2>
    <form action="controller/insert-ad.php" method="POST" autocomplete="on" enctype="multipart/form-data">
        <h3>Naslov:</h3>
        <input type="text" name="title" placeholder="" required>
        <h3>Tekst oglasa:</h3>
        <textarea name="text" id="" cols="40" rows="10" placeholder="" required></textarea>
        <h3>Država:</h3>
        <select name="countryId" id="">
            <?php  $result = $ad->selectAdCountry(); foreach($result as $x):  ?>
                <option value=<?php echo $x->country_id; ?> class="form-control"><?php echo $x->name; ?></option>
            <?php endforeach; ?>
        </select>
        <h3>Grad:</h3>
        <input type="text" name="city" placeholder="" required>
        <h3>Kategorija:</h3>
        <select name="categoryId" id="">
            <?php  $result = $ad->selectAdCategory(); foreach($result as $x):  ?>
                <option value=<?php echo $x->ad_category_id; ?> class="form-control"><?php echo $x->name; ?></option>
            <?php endforeach; ?>
        </select>
        <h3>Cena:</h3>
        <input type="number" name="price" placeholder="">
        <h3>Valuta:</h3>
        <select name="currencyId" id="">
            <?php  $result = $ad->selectAdCurrency(); foreach($result as $x):  ?>
                <option value=<?php echo $x->currency_id; ?> class="form-control"><?php echo $x->name; ?></option>
            <?php endforeach; ?>
        </select>
        <h3>Kontakt:</h3>
        <input type="text" name="contact" placeholder="Kontakt">

        <h3>Slika 1 (opciono):</h3>
        <input class="uploadImage" type="file" name="file1">
        <h3>Slika 2 (opciono):</h3>
        <input class="uploadImage" type="file" name="file2">
        <h3>Slika 3 (opciono):</h3>
        <input class="uploadImage" type="file" name="file3">
        <h3>Slika 4 (opciono):</h3>
        <input class="uploadImage" type="file" name="file4">
        <h3>Slika 5 (opciono):</h3>
        <input class="uploadImage" type="file" name="file5">
        
        <h3>Atributi oglasa:</h3>
        <section class="checkBox"> 
            <?php  $result = $ad->selectAdTag(); foreach($result as $x):  ?>
                <div>
                    <input type="checkbox" name=<?php echo $x->name; ?> value=<?php echo $x->tag_id; ?> >
                    <label for=<?php echo $x->name; ?>><?php echo ' '.$x->name; ?></label><br>
                </div>
            <?php endforeach; ?>
        </section>
        <button type="submit" name="submit">Postavi oglas</button>
    </form>
</section>

<?php require 'partials/footer.php'; ?>