<?php
class PostModel extends LModel {
    
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }
    
    public function getList($page = 0) {
        $postList = array();
        
        // get data
        $pdo = $this->getPdo();
        $sql = "SELECT * FROM `post`";
        $cmd = $pdo->prepare($sql);
        $cmd->execute();
        $ret = $cmd->fetchAll();

        // pack
        foreach ($ret as $r) {
            $postList[] = array(
                'content' => Markdown($r['content']),
                );
        }
        return $postList;
    }
}
?>