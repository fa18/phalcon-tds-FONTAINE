<!--Affiche la liste des utilisateurs-->
   <?php if (isset($successUserAdd)) { ?>
    <div class="ui green message"><?= $successUserAdd ?></div>
    <?php } ?>

    <?php if (isset($erreurUserAdd)) { ?>
    <div class="ui red message"><?= $erreurUserAdd ?></div>
    <?php } ?>

    <?php if (isset($successUserDelete)) { ?>
    <div class="ui green message"><?= $successUserDelete ?></div>
    <?php } ?>

<div class="ui container">
</br>

<?= $this->tag->linkTo(['users/index/1/id/desc', '
<button class=\'ui primary button\' >
 <i class=\'address book icon yellow\'></i> Users
</button>']) ?>

<?= $this->tag->linkTo(['users/form/', '
<button class=\'ui primary button\' >
 <i class=\'add user icon yellow\' ></i> Ajouter un nouvel utilisateur
</button>']) ?>

<div class="ui transparent left icon input">
  <form method="get">
    <input name="filter" type="text" placeholder="Search...">
    <i class="search icon"></i>
  </form>
</div>


<table class="ui inverted table">
  <thead>
    <tr><th><div class="ui checkbox "> <input type="checkbox" name="check"><label></label></div></th>
    <?php foreach ($tabColonnes as $colonne) { ?>
      <?php if ($champActuel == $colonne) { ?>
        <?php if ($sensTri == 'asc') { ?>

          <th class="sorted ascending" onclick="window.location.href='<?= $href ?>/<?= $colonne ?>/desc'"/>
          <?php } else { ?>
            <th class="sorted descending" onclick="window.location.href='<?= $href ?>'"/>
          <?php } ?>
        <?php } else { ?>
          <th onclick="window.location.href='<?= $href ?>/<?= $colonne ?>/asc'"/>
        <?php } ?>
        <?= $colonne ?> 
                 <?php if ($sensTri == 'asc') { ?> <i class="chevron circle down icon"></i>
                 <?php } else { ?> <i class="chevron circle up icon"></i> <?php } ?>
          </th>
    <?php } ?>

    <th>Action</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($pager->items as $user) { ?> <!-- in users -->
    <tr>
      <td><div class="ui checkbox "> <input type="checkbox" name="check"><label></label></div></td>
      <td><?= $user->getId() ?> </td>
      <td><?= $user->getLogin() ?></td>
      <td><?= $user->getFirstname() ?></td>
      <td><?= $user->getLastname() ?></td>
      <td><?= $user->getEmail() ?></td>
      <td><?= $user->getRole()->getName() ?></td>
      <td>
        <?= $this->tag->linkto('users/show/' . $user->getId(), '<i class=\'unhide icon yellow\'></i>') ?> 
        <?= $this->tag->linkto('users/form/' . $user->getId(), '<i class=\'write icon\'></i>') ?> 
        <?= $this->tag->linkto('users/delete/' . $user->getId(), '<i class=\'erase icon red\'></i>') ?>
      </td>
    </tr>
   <?php } ?>
  </tbody>
  <tfoot>
    <tr><th colspan="8">
      <div class="ui right floated pagination menu">
        
        
        <?= $this->tag->linkto('users/index/' . $pagePrec . $slash . $champ . $slash . $sens, '<i class=\'left chevron icon\'></i></a>') ?>
        
        <a class="item active"><?= $pageCourante ?></a>
        
        <?= $this->tag->linkto('users/index/' . $pageSuiv . $slash . $champ . $slash . $sens, '<i class=\'right chevron icon\'></i></a>') ?>
        </a>
      </div>
    </th>
  </tr></tfoot>
</table>
</div>