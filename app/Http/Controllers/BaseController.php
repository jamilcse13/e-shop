<?php

namespace App\Http\Controllers;

use App\Traits\FlashMessages;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    use FlashMessages;

    protected $data = null;


    /**
     * Undocumented function
     *
     * @param [type] $title
     * @param [type] $subTitle
     * @return void
     */
    protected function setPageTitle($title, $subTitle)
    {
        view()->share(['pageTitle' => $title, 'subTitle' => $subTitle]);
    }


    /**
     * Undocumented function
     *
     * @param integer $errorCode
     * @param [type] $message
     * @return void
     */
    protected function showErrorPage($errorCode = 404, $message = null)
    {
        $data['message'] = $message;
        return response()->view('errors'.$errorCode, $data, $errorCode);
    }


    /**
     * Undocumented function
     *
     * @param boolean $error
     * @param integer $responseCode
     * @param array $message
     * @param [type] $data
     * @return void
     */
    protected function responseJson($error = true, $responseCode = 200, $message = [], $data = null)
    {
        return response()->json([
            'error'         => $error,
            'response_code' => $responseCode,
            'message'       => $message,
            'data'          => $data
        ]);
    }


    /**
     * Undocumented function
     *
     * @param [type] $route
     * @param [type] $message
     * @param string $type
     * @param boolean $error
     * @param boolean $withOldInputWhenError
     * @return void
     */
    protected function responseRedirect($route, $message, $type = 'info', $error = false, $withOldInputWhenError = false)
    {
        $this->setFlashMessage($message, $type);
        $this->showFlashMessages();

        if ($error && $withOldInputWhenError) {
            return redirect()->back()->withInput();
        }

        return redirect()->route($route);
    }


    /**
     * @param $message
     * @param string $type
     * @param bool $error
     * @param bool $withOldInputWhenError
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function responseRedirectBack($message, $type = 'info', $error = false, $withOldInputWhenError = false)
    {
        $this->setFlashMessage($message, $type);
        $this->showFlashMessages();

        return redirect()->back();
    }
}
