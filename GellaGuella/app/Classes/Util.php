<?php

namespace App\Classes;

class Util{

    // Functions

    public function flashSuccess($message) {
        $this->setupFlash($message, 'success');
    }

    public function flashError($message) {
        $this->setupFlash($message, 'error');
    }

    private function setupFlash($message, $type) {
        session()->flash('swal_msg', [
            'type' => $type,
            'message' => $message
        ]);
    }

}