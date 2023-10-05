<div class="menu">
        <ul>
            <li class="logo">
            <?php $session = session();?>
            <h3><?php echo "Welocome back, " . $session->get('user_name'); ?></h3>
            </li>
            <li class="menu-toggle">
                <button onclick="toggleMenu();">&#9776;</button>
            </li>
            <li class="menu-item hidden"><?= anchor('/', 'Home') ?></li>
            <li class="menu-item hidden"><?= anchor('/hello?name='. 'World', 'Link to Hello', ['target' => '_blank']) ?>
            </li>
            <li class="menu-item hidden"><?= anchor('/namelist', 'CRUD', ['target' => '_blank']) ?></li>
            <li class="menu-item hidden"><?= anchor('/logout', 'Logout') ?></li>
        </ul>
    </div>
