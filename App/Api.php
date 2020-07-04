<?php

namespace App;

/**
 * Description of Database
 *
 * @author augus
 */
class Api {

    public function getPosts() {
            $url = 'https://jsonplaceholder.typicode.com/posts';

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_TIMEOUT, 0);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-type": "application/json'));

            $this->callBack = trim(curl_exec($ch));
            curl_close($ch);
            $this->callBack = json_decode($this->callBack, true);
            
            return $this->callBack;

    }

    public function getComments() {
        $url = 'https://jsonplaceholder.typicode.com/comments';

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT, 0);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-type": "application/json'));

        $this->callBack = trim(curl_exec($ch));
        curl_close($ch);
        $this->callBack = json_decode($this->callBack, true);

        return $this->callBack;
    }

    public function getTodos() {
        $url = 'https://jsonplaceholder.typicode.com/todos';

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT, 0);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-type": "application/json'));

        $this->callBack = trim(curl_exec($ch));
        curl_close($ch);
        $this->callBack = json_decode($this->callBack, true);

        return $this->callBack;
    }

    public function getAlbums() {
        $url = 'https://jsonplaceholder.typicode.com/albums';

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT, 0);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-type": "application/json'));

        $this->callBack = trim(curl_exec($ch));
        curl_close($ch);
        $this->callBack = json_decode($this->callBack, true);

        return $this->callBack;
    }

    public function getSpecificAlbum($id) {
        
        $url = 'https://jsonplaceholder.typicode.com/albums/' . $id . '/photos';

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT, 0);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-type": "application/json'));
        set_time_limit(0);

        $this->callBack = trim(curl_exec($ch));
        curl_close($ch);
        $this->callBack = json_decode($this->callBack, true);

        return $this->callBack;
    }

    public function getPhotos() {
        $url = 'https://jsonplaceholder.typicode.com/photos';

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT, 0);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-type": "application/json'));

        $this->callBack = trim(curl_exec($ch));
        curl_close($ch);
        $this->callBack = json_decode($this->callBack, true);

        return $this->callBack;
    }

    public function getUsers() {
//        var_dump($category, $word);die;
        $url = 'https://jsonplaceholder.typicode.com/users';
//        var_dump($url);die;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 0);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-type": "application/json'));

        $this->callBack = trim(curl_exec($ch));
        curl_close($ch);
        $this->callBack = json_decode($this->callBack, true);
//        var_dump($this->callBack);die;

        return $this->filter($this->callBack);
    }

    public function getUserSpecific($id) {
        $url = 'https://jsonplaceholder.typicode.com/users/' . $id;

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT, 0);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-type": "application/json'));
        set_time_limit(0);

        $this->callBack = trim(curl_exec($ch));
        curl_close($ch);
        $this->callBack = json_decode($this->callBack, true);

        return $this->callBack;
    }

    private function filter($arr) {
      if (count($_GET) > 0 && isset($_GET['category']) && $_GET['inputSearch']) {
        return array_filter($arr, function($position) {
          return stristr($position[$_GET['category']], $_GET['inputSearch']);
          // return $position[$_GET['category']] == $_GET['inputSearch'];
        });
      };

      return $arr;
    }
}
