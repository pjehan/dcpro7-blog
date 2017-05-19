<div class="col-sm-3 col-md-2 sidebar">
    <ul class="nav nav-sidebar">
        <li class="<?php if(preg_match("/admin\/$/", $_SERVER["REQUEST_URI"])) : ?>active<?php endif; ?>">
            <a href="<?php echo $website_root; ?>admin/">Dashboard</a>
        </li>
        <li class="<?php if(strpos($_SERVER["REQUEST_URI"], "crud/article")) : ?>active<?php endif; ?>">
            <a href="<?php echo $website_root; ?>admin/crud/article/">Articles</a>
        </li>
        <li class="<?php if(strpos($_SERVER["REQUEST_URI"], "crud/categorie")) : ?>active<?php endif; ?>">
            <a href="<?php echo $website_root; ?>admin/crud/categorie/">Catégories</a>
        </li>
        <li class="<?php if(strpos($_SERVER["REQUEST_URI"], "crud/tag")) : ?>active<?php endif; ?>">
            <a href="<?php echo $website_root; ?>admin/crud/tag/">Tags</a>
        </li>
    </ul>
</div>