<?php require 'view_beginco.php'; ?>

<style>
table { 
    border-collapse : collapse;
    margin : auto;
}

td,th {
border : 1px solid black;
width : 220px;
height : 30px;
}

</style>

<main>

    <h1 style="color: #000000; text-align: center; margin-top: 20px;">Bonjour<?php if (!empty($welcome)) : ?> <?php echo htmlspecialchars($welcome); ?><?php endif; ?></h1>

    <section class="tirage" id="tirage" style="text-align: center; margin-bottom: 20px;">
        <form action="?controller=admin&action=draw" method="post">
            <button type="submit" class="tirage-bt">Tirer au sort</button>
        </form>

        <?php if (!empty($winnerEmail)) : ?>
            <h3 style="margin-top: 20px;">Le gagnant est : <?php echo htmlspecialchars($winnerName); ?> (<?php echo htmlspecialchars($winnerEmail); ?>)</h3>
        <?php endif; ?>

        <?php if (!empty($errorMsg)) : ?>
            <div class="alert"><?php echo htmlspecialchars($errorMsg); ?></div>
        <?php endif; ?>
    </section>

    <section class="list" id="list">
        <table>
            <tr class="list-title">
                <th>NOM</th>
                <th>Prénom</th>
                <th>E-mail</th>
                <th>Nationalité</th>
                <th>Numéro du Passeport</th>
                <th>Date expiration du passeport</th>
                <th>Date de naissance</th>
                <th>Loterie</th>
                <th class="sansBordure"></th>
            </tr>

            <!-- Récupération des infos dans la BDD pour la liste -->
            <?php foreach ($users as $user) : ?>
            <tr class="list-info">
                <td><?php echo htmlspecialchars($user['nom']); ?></td>
                <td><?php echo htmlspecialchars($user['prenom']); ?></td>
                <td><?php echo htmlspecialchars($user['email']); ?></td>
                <td><?php echo htmlspecialchars($user['nation']); ?></td>
                <td><?php echo htmlspecialchars($user['numPass']); ?></td>
                <td><?php echo htmlspecialchars($user['dateExpPass']); ?></td>
                <td><?php echo htmlspecialchars($user['dateNaissance']); ?></td>
                <td><?php echo $user['loterie'] ? 'Oui' : 'Non'; ?></td>
                <td class="sansBordure">
                    <?php if ($user['role'] != 'admin') : ?>
                    <a href="?controller=admin&action=remove&id_utilisateur=<?php echo $user['id_utilisateur']; ?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer <?php echo htmlspecialchars($user['nom']); ?> ?');">
                        <i class="fa-solid fa-trash" style="color: #000000"></i>
                    </a>
                    <?php endif; ?>
                </td>
            </tr>
            <?php endforeach ?>                                
        </table>     

    </section>

</main>

<?php require 'view_end.php'; ?>
