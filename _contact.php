<section id="contact-stephane-lieumont-graphiste-3d" class="color2">
    <div class="parallax" style='background-image: url("Styles/img/BGcontact.jpg");'></div>
    <h2 class="reveal">Contact</h2>
    <?php $validator = new validator($_SESSION); ?>
    <form class="reveal" action="post_contact.php" method="POST" id="contactForm">
        <?php $form = new Form(isset($_SESSION['inputs']) ? $_SESSION['inputs'] : []); ?>
        <div class="col-xs-4">
            <?= $form->text('name', 'Votre nom'); ?>
        </div>
        <div class="col-xs-4">
            <?= $form->email('email', 'Votre E-mail'); ?>
        </div>
        <div class="col-xs-4">
            <?= $form->text('subject', 'Sujet'); ?>
        </div>
        <div class="col-xs-12">
            <?= $form->textarea('message', 'Votre message'); ?>
            <?= $validator->pop_errors() ?>
            <?= $form->submit('Envoyer') ?>
        </div>
    </form>

</section>