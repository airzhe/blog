<?php
require 'init.inc.php';
try{
    $action = $_GET['action'];
    if(!$action){
        throw new Exception('param error!');
    }
    switch ($action){
        case 'edit':
            if(!empty($_POST)){
                $title = isset($_POST['title'])?trim($_POST['title']):'';
                $category = $_POST['category'];
                $tags = isset($_POST['tags'])?str_replace('，',',',trim($_POST['tags'])):'';
                $content = isset($_POST['content'])?trim($_POST['content']):'';
                $datetime = $_POST['datetime']?strtotime(trim($_POST['datetime'])):time();
                $hits = $_POST['hits']?(int)$_POST['hits']:100;
                $template = $_POST['template'];
                $error_msg = array();
                if(!$title){
                    $error_msg[] = '文章标题不能为空！';
                }
                if(!$content){
                    $error_msg[] = '文章内容不能为空！';
                }
                if(!empty($error_msg)){
                    $msg = implode('<br/>',$error_msg);
                    throw new Exception($msg);
                }

                $id = isset($_GET['id'])?(int)$_GET['id']: $redis->incr('article:count');
                $data = array('id'=>$id,
                    'title'=>$title,
                    'category'=>$category,
                    'content'=>$content,
                    'datetime'=>$datetime,
                    'hits'=>$hits,
                    'template'=>$template
                );


                if($_GET['id']){
                    //update
                    $original_data=$redis->hGetAll("article:$id");
                    $update_data = array_diff_assoc($data,$original_data);
                    $redis->hMset("article:$id",$update_data);
                }else{
                    //insert
                    $redis->hMset("article:$id",$data);
                    $redis->rPush('article:list',$id);
                }

                if($tags){
                    $tagsList = explode(',',$tags);
                    foreach($tagsList as $v){
                        $redis->sAdd("article:$id:tags",$v);
                        $redis->sAdd($v,$id);
                    }
                }
                success('操作成功','article_list.php');

            }else{
                throw new Exception('请求错误');
            }
            break;
        case 'del':
            $id = isset($_GET['id'])?trim($_GET['id']):'';
            if($id){
                $redis->multi();
                $redis->del("article:$id");
                $redis->lRem('article:list',$id,0);
                $redis->exec();
                success('删除成功');
            }else{
                throw new Exception('请求错误');
            }
            break;
    }

}catch (Exception $e){
    error($e->getMessage());
}