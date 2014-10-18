<?php

class CategoriaTest extends CDbTestCase{
    public $fixtures = array(
        'acticidades'=>'Actividad',
        'categorias'=>'Categoria',
    );
    
    public function testApprove(){
        $categoria = new Categoria;
        $categoria->setAttribute(array(
            'content'=>'categoria 1',
            'status'=>'Categoria::STATUS_PENDING',
            'createTime'=>time(),
            'author'=>'CristianYanza',
            'email'=>'cdyanza@unicauca.edu.co',
            'actividadId'=>$this->actividades['YOLO']['ID_ACTIVIDAD'],
        ), false);
        $this->assertTrue($categoria->save(false));
        
        $categoria = Categoria::model()->findByPk($categoria->ID_CATEGORIA);
        $this->assertTrue($categoria instanceof Categoria);
        $this->asserEquals(Categoria::STATUS_PENDING,$categoria->status);
        
        $categoria->approve();
        $this->assertEquals(Categoria::STATUS_APPROVED,$categoria->status);
        $categoria = Categoria::model()->findByPk($categoria->ID_CATEGORIA);
        $this->assertEquals(Categoria::STATUS_APPROVED,$categoria->status);
    }
}
