<?php $this->titre = "Vue Chat"; ?>


<div class="container">

    <div class="friendslist">
        <div class="chatlogs">
            <?php foreach ($users as $user): ?>
                <div class="chat friend">
                    <a href="chat/<?= $this->nettoyer($user['id']) ?>  " >
                        <?= $this->nettoyer($user['surnom']) ?> </a>

                </div>
                <span class="notification">
                        <?= $this->nettoyer($user['notification']) ?>
                </span>
            <?php endforeach; ?>

        </div>
    </div>

    <div class="chatbox">
        <h3> <?= $this->nettoyer($current_receiver['surnom']) ?> </h3>
        <div class="chatlogs">


            <?php foreach ($messages as $message): ?>

            <?php if ($message['id_user_emetteur'] == $idUtilisateur): ?>
                <p> <?= $this->nettoyer($surnomUtilisateur) ?> dit : </p>
                <div class="chat self">
            <?php else : ?>
                <p> <?= $this->nettoyer($current_receiver['surnom']) ?> dit:   </p>
                <div class="chat friend">
            <?php endif ?>
                    <div class="user-photo">

                    </div>
                    <p class="chat-message">
                        <?= $this->nettoyer($message['message']) ?>
                        <br>
                        <spam style="float: right" ><?= $this->nettoyer($this->formatDate ( $message['cree_a'])) ?></spam>

                    </p>
                </div>
                <?php endforeach; ?>
            </div>
            <form method="post" action="chat/envoyer/<?= $this->nettoyer($current_receiver['id']) ?>" class="chat-form">
                <textarea id="message" name="message"
                          rows="4"
                          placeholder="Votre commentaire"
                          required></textarea>
                <button type="submit" >Envoyer</button>
            </form>
        </div>
    </div>
