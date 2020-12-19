<?php

namespace Ci4adminrbac\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;
use Ci4adminrbac\Config\Services;

class RedirectIfAuthenticated implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $auth = Services::auth();
        $hasLogin = $auth->hasLogin();
        if ($hasLogin) {
            return redirect()->to(site_url($auth->getSuccessUrl()));
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
    }
}
