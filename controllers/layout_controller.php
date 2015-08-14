<?php
class Layout_Controller extends Super_Controller {
    
    // Get data of top nav and then validate. format json.
    public function getNavigationData() {
        $result = array();        
        
        $this->session = &load_class('session');        
        $isLogin = false !== $this->session->get('user') ? true : false;
        
        $this->load->model('navigation', 'm');
        $data = $this->m->getAllData();
        
        foreach ($data as $k => &$item) {
            if (!$isLogin && $item['privilege'] === 'R') {  // anonymous
                unset($data[$k]);
            }
            unset($data[$k]['privilege']);
            /*$id  = $item['id'];
            $pid = $item['pid'];
            unset($item['privilege']);
            unset($item['pid']);
            if ($pid === '-1') {
                if (empty($result[$id])) {
                    $children = array();
                } else {
                    $children = $result[$id]['children'];
                    
                }
                $result[$id] = $item;
                $result[$id]['chidlren'] = $children;
            } else {
                if (empty($result[$pid])) {
                    $result[$pid] = array('children' => array($item));
                } else {
                    $result[$pid]['children'][] = $item;
                }
            }*/
        }
        $result = array_values($data);
        $this->echoRet($result);
    }
}
