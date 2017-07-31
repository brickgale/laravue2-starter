<?php

namespace App\Traits;

use Illuminate\Http\Request;
use File;

trait FileTrait {

    /**
     * Upload User Avatar
     *
     * @param Request
     * @return path
     */
    public function uploadFile(Request $request, $field_key)
    {
        $file_key = $request->file_key;
        $a_file = [];

        if ($request->hasFile($file_key))
        {            
            $file_prefix = $request->has('file_prefix') ? $request->input('file_prefix') : 'file';
            $file_path = $request->has('file_path') ? $request->input('file_path') : 'uploads/';
            $file = $request->file($file_key);
            $a_file['file_name'] = $file_prefix.time().'-'.rand(111,999).'.'.$file->getClientOriginalExtension();

            //removed original file name temporarily due to saving filename character bug
            // $a_file['file_name'] = $file_prefix.time().'-'.rand(111,999).$file->getClientOriginalName();
            
            $a_file['mime_type'] = $file->getClientMimeType();
            $a_file['size'] = $file->getClientSize();
            $a_file[$field_key] = $file_path.'/'.$a_file['file_name'];

            $this->storage->put(
                $a_file[$field_key],
                File::get($file->getrealpath())
            );

            if($request->has('current_file_url')) {
                $this->storage->readAndDelete($request->input('current_file_url'));
            }
        }

        return $a_file;
    }

    /**
     * Show File
     *
     * @param Image path
     * @return image
     */
    public function showFile($file_path, $file_name)
    {
        $a_file_details = $this->checkFile($file_path, $file_name);

        if(!is_array($a_file_details)) {
            return $a_file_details;
        }
        // return response()->download($path, $filename);
        return response()->make(File::get($a_file_details['path']), 200)->header('Content-type', $a_file_details['mime']);
    }

    /**
     * Check File Exist
     *
     * @param File path
     * @return path, file, filename, mime
     */
    public function checkFile($file_path, $file_name = null)
    {
        $exists = $this->storage->has($file_path);

        $path = storage_path(sprintf('app/public/%s', $file_path));
        $file_info = pathinfo($path);
        $filename = $file_info['basename'];

        if (!$exists || (!is_null($file_name) && $file_name != $filename) ) {
            return response()->make(['message' => 'File not found.'], 404);
        }

        $file = $this->storage->get($file_path);
        $mime = $this->storage->mimeType($file_path);
        $size = $this->storage->size($file_path);
        $no_ext = $file_info['filename'];

        return compact('path','filename','file','mime','size','no_ext');
    }
}