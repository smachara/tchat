<?php $this->titre = "Vue Chat"; ?>


<div class="container">

    <div class="friendslist">
        <div class="chatlogs">
            <?php foreach ($users as $user): ?>
                <div class="chat friend">
                    <a href="chat/<?= $this->nettoyer($user['id']) ?>  " >
                        <?= $this->nettoyer($user['surnom']) ?> </a>
                </div>
            <?php endforeach; ?>

        </div>
    </div>

    <div class="chatbox">

        <div class="chatlogs">

            <p><?= var_dump($current_receiver['surnom']) ?> </p>

<!--                $this->nettoyer($current_receiver['surnom'])
-->        <?php foreach ($messages as $message): ?>




            <?php if ($message['id_user_emetteur'] == $idUtilisateur): ?>
               <p> <?= $this->nettoyer($user['surnom']) ?> dit :</p>
               <p><?= $this->nettoyer($message['cree_a']) ?></p>
                <div class="chat self">
            <?php else : ?>
                    <p><?= $this->nettoyer($message['id_user_recepteur']) ?> dit : </p>
                    <p><?= $this->nettoyer($message['cree_a']) ?></p>
                <div class="chat friend">
            <?php endif ?>

<!--                    <div class="user-photo"></div>
-->                    <p class="chat-message">
                        <?= $this->nettoyer($message['message']) ?>
                    </p>
                </div>
                <?php endforeach; ?>
            </div>
            <form method="post" action="chat/envoyer/<?= $this->nettoyer($user['id']) ?>" class="chat-form">
                <textarea id="message" name="message"
                          rows="4"
                          placeholder="Votre commentaire"
                          required></textarea>
                <button type="submit" >Envoyer</button>
            </form>
        </div>
    </div>
