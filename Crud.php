<?php 
    interface Crud{
    public function save($conn);
    public function readAll($conn);
    public function readUnique($conn,$id);
    public function search($conn,$query);
    public function update($conn,$id);
    public function removeOne($conn,$id);
    public function removeAll($conn);
}
?>