<?php
/*
 * IKPHP爱客网 安装程序 @copyright (c) 2012-3000 IKPHP All Rights Reserved @author 小麦
* @Email:160780470@qq.com
*/
class articleModel extends Model {
	
	public function getOneArticle($id){
		$where['aid'] = $id;
		$strArticle = $this->where($where)->find();
		if(is_array($strArticle)){
			$articleItem = M('article_item')->where(array('itemid'=>$strArticle['itemid']))->find();
			//array_merge() 函数把两个或多个数组合并为一个数组
			$result = array_merge($articleItem, $strArticle);
			$result['user'] = D('user')->getOneUser($articleItem['userid']);
			//获取 主图
			if($articleItem['isphoto']){
				$result ['photo'] = ikhtml_img('article', $articleItem['itemid'], $result ['content']);
			}
			$result ['content'] = nl2br ( ikhtml('article',$id,$result['content'],1));

			return $result;
		}
		return false;
	}
	// 删除一篇文章
	public function delOneArticle($id){
		$where['aid'] = $id;
		$strArticle = $this->where($where)->find();
		if(is_array($strArticle)){
			// 删除信息表
			M('article_item')->where(array('itemid'=>$strArticle['itemid']))->delete();
			$this->where($where)->delete();
			// 删除照片
			D('images')->delAllImage('article',$id);
			// 删除视频
			D('videos')->delAllVideo('article',$id);
		}
	}
	// 删除多篇文章
	public function delArticle($id){
		$where['aid'] = array('exp',' IN ('.$id.') ');
		$map['itemid'] = array('exp',' IN ('.$id.') ');
		$data['typeid'] = array('exp',' IN ('.$id.') ');
		$data['type'] = 'article';
		//先删除信息表
		M('article_item')->where($map)->delete(); 
		//删除内容
		$this->where($where)->delete(); 
		// 删除照片
		D('images')->where($data)->delete();
		// 删除视频
		D('videos')->where($data)->delete();
		return true;
	}
	// 获取一篇文章的信息
	public function getOneArticleItem($itemid){
		$where['itemid'] = $itemid;
		$strItem = M('article_item')->where($where)->find();
		if(!empty($strItem)){
			return $strItem;
		}else{
			return false;
		}
	}
	// 获取最新发表的文章
	public function getNewArticleItem($limit){
		$where['isaudit'] = '0';
		$strItem = M('article_item')->where($where)->order('addtime desc')->limit($limit)->select();
		if(!empty($strItem)){
			return $strItem;
		}else{
			return false;
		}		
	}
	// 获取点击最多的文章
	public function getArticleItemByMap($order,$limit='10',$where=''){
		$where['isaudit'] = '0';
		$arrItemid = M('article_item')->field('itemid')->where($where)->order($order)->limit($limit)->select();
		if(!empty($arrItemid)){
			
			foreach($arrItemid as $key=>$item){
				$arrArticle [] = $this->getOneArticle($item['itemid']);
			}
			return $arrArticle;
		}else{
			return false;
		}
	}
	//获取频道内的文章
	public function getArticleByChannel($nameid,$limit = 5){
		// 获取分类
		$arrCate = D ('article_cate')->where(array('nameid'=>$nameid))->order('orderid asc')->select (); 
		if(is_array($arrCate)){
			foreach($arrCate as $item){
				$arrCates[] = $item['cateid'];
			}
		}
		$strCates = implode(',',$arrCates);
		//查询条件 是否审核
		$map['cateid'] = array('exp',' IN ('.$strCates.') ');
		$map['isaudit'] = 0;
		$map['isphoto'] = 1;
		$arrItemid =  M ( 'article_item' )->field('itemid')->where($map)->order('orderid desc')->limit($limit)->select();
		foreach($arrItemid as $key=>$item){
			$arrArticle [] = $this->getOneArticle($item['itemid']); 
		}
		return $arrArticle;		
	}

}