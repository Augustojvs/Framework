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
        $url = 'https://jsonplaceholder.typicode.com/albums/' . $id;

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
        $url = 'https://jsonplaceholder.typicode.com/users';

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

}
