<?php
/**
 * Partial for the 404 error component
 * 
 * @package Emertech WordPress theme
 */

$search_validity = __('Por favor insira um termo de pesquisa', 'emertech');
$search_label = __('Pesquisar', 'emertech');

?>

<form action="<?php echo esc_url(home_url('/')); ?>" method="get" class="searchform d-flex">

    <div class="row g-2">
        <div class="col-9">
            
            <input type="search" class="form-control" name="s" id="search" 
                value="<?php the_search_query(); ?>" 
                oninvalid="this.setCustomValidity('<?php echo $search_validity; ?>')"   
                placeholder="<?php echo $search_label; ?>" required>
        </div>

        <div class="col-auto">
            <button type="submit" class="btn btn-outline-primary" title="<?php echo $search_label; ?>">
                <span class="bi bi-search"></span>
            </button>
        </div>
    </div>

    <input type="hidden" name="post_type" value="post" required>
</form>