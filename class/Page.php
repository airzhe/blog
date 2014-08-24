<?php
class Page{

    protected $page;
    protected $page_size;
    protected $count;

    function __construct($page,$page_size,$count){
        $this->page = $page;
        $this->page_size = $page_size;;
        $this->count = $count;
    }

    public function create_links(){
        $uri = parse_str($_SERVER['QUERY_STRING']);

        $page_html = '';
        $count_page = ceil($this->count/$this->page_size);
        if($this->page < 1){
            $this->page = 1;
        }
        if($this->page > $count_page){
            $this->page = $count_page;
        }
        if($this->page != 1){
            $uri['page'] = $this->page - 1;
            $next_nav = '<div class="nav-next pull-right"><a href="?' . http_build_query($uri) . '">较新文章 <span class="meta-nav">→</span></a></div>';
        }
        if($this->page != $count_page){
            $uri['page'] = $this->page + 1;
            $prev_nav = '<div class="nav-previous pull-left"><a href="?' . http_build_query($uri) . '"><span class="meta-nav">←</span> 早期文章</a></div>';
        }
        if($prev_nav || $next_nav){
            $page_html = <<<HTML
            <div class="navigation paging-navigation">
                <div class="container">
                    <div class="col-md-6 col-md-offset-3">
                    $next_nav $prev_nav
                    </div>
                </div>
            </div>
HTML;
        }
        return $page_html?$page_html:'';
    }
}