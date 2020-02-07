<?php
class categoriesController extends Controller 
{
	private $user;

    public function __construct() 
    {
        parent::__construct();
    }

    public function index()
    {
        header("Location: ".BASE_URL);
    }

    public function enter($id) 
    {   
        $store = new Store();       
        $categories = new Categories();        
        $products = new Products();  
        $f = new Filters();  

        $data = $store->getTemplateData();
        $data['category_name'] = $categories->getCategoryName($id);

        if (!empty($data['category_name'])) {
            $currentPage = 1;
            $offset = 0;
            $limit = 3;

            if (!empty($_GET['p'])) {
                $currentPage = $_GET['p'];
            }

            $offset = ($currentPage * $limit) - $limit;;

            $filters = array('category' => $id);

            $data['category_filter'] = $categories->getCategoryTree($id); 

            $data['list'] = $products->getList($offset, $limit, $filters);
            $data['totalItens'] = $products->getTotal($filters);
            $data['numberOfPages'] = ceil($data['totalItens'] / $limit);
            $data['currentPage'] = $currentPage;

            $data['id_category'] = $id;

            $data['filters'] = $f->getFilters($filters);
            $data['filters_selected'] = $filters;
            $data['searchTerm'] = '';
            $data['category'] = '';

            $data['categories'] = $categories->getList();

            $data['sidebar'] = true;

            $this->loadTemplate('categories', $data);
        } else {
            header("Location: ".BASE_URL);
        }
    }
}