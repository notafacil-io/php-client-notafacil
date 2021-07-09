<?php
namespace NotaFacil\Common\Exceptions;



use Exception;

/**
 * Class NotaFacilException
 */
class NotaFacilException extends Exception
{
    /**
     * Any extra data to send with the response.
     *
     * @var array
     */
    public $data = [];

    /**
     * The status code to use for the response.
     *
     * @var integer
     */
    public $code = 422;

    /**
     * Create a new exception instance.
     *
     * @param string $message
     */
    public function __construct($message)
    {
        parent::__construct($message);
    }

  
    public function render($request)
    {
        if ($request->expectsJson() != true) {
            return $this->handleAjax();
        }

        return redirect()->back()
            ->withInput()
            ->withErrors($this->getMessage());
    }

    /**
     * Handle an ajax response.
     */
    private function handleAjax()
    {
        return response()->json([
            'error'   => true,
            'message' => $this->getMessage(),
            'data'    => $this->data
        ], $this->code);
    }

    /**
     * Set the extra data to send with the response.
     *
     * @param array $data
     *
     * @return $this
     */
    public function withData(array $data)
    {
        $this->data = $data;

        return $this;
    }

    /**
     * Set the HTTP code code to be used for the response.
     *
     * @param integer $code
     *
     * @return $this
     */
    public function withCode($code)
    {
        $this->code = $code;

        return $this;
    }

}

