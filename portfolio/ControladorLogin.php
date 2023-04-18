<?php

namespace App\Http\Controllers;

//use Adldap\Laravel\Facades\Adldap;
use Illuminate\Http\Request;
use App\Entidades\Sistema\Usuario;
use App\Entidades\Sistema\RegistroIP;
use App\Entidades\Sistema\Area;
use App\Entidades\Sistema\Patente;
use App\Entidades\Sistema\Menu;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Session;

require app_path() . '/start/constants.php';
require app_path() . '/start/funciones_generales.php';

class ControladorLogin extends Controller
{
    public function index(Request $request)
    {
        $titulo = 'Acceso';

        /*$ip = $this->getIP();

        $regIP = new RegistroIP();

        if ($regIP->verificarIP($ip) >= 20) {
            exit;
        } else {*/
        return view('sistema.login', compact('titulo'));
        //}

        // if((substr($request->ip(), 0, 7 ) == "157.92.") || $request->ip() == "190.2.6.187") {
        //   } else {
        //       return redirect(env('APP_URL_AUTOGESTION') . '');
        //   }
    }

    public function login(Request $request)
    {
        return view('sistema.home');
    }

    public function logout(Request $request)
    {
        Session::flush();
        return redirect('login');
    }

    public function entrar(Request $request)
    {
        $usuario = fescape_string(trim($request->input('txtUsuario')));
        $clave = fescape_string(trim($request->input('txtClave')));

        //$user_format = env('ADLDAP_USER_FORMAT', 'uid=%s,'.env('ADLDAP_BASEDN', ''));
        //$userdn = sprintf($user_format, $usuario);
        //$conexion = ldap_connect(env('ADLDAP_CONTROLLERS'), "389");
        //ldap_set_option($conexion, LDAP_OPT_PROTOCOL_VERSION, 3);

        //if(@ldap_bind($conexion, $userdn, $clave)){
        #$this->log($usuario);

        if ($usuario != "" && $clave != "") {
            //$resultado_ldap = Adldap::search()->where('uid', '=', $usuario)->get();
            //$search = Adldap::search()->users()->find('ntarche');
            //$usuarioLdap = $resultado_ldap[0]["uid"][0];

            $entidad = new Usuario();
            // llamo al modelo
            $lstUsuario = $entidad->validarUsuario($usuario, $clave);

            // si el usuario y la contraseña ingresado es igual a lo obtenido del modelo redirect al form usuarios, sino from login


            if (count($lstUsuario) > 0) {
                $titulo = 'Inicio';
                $request->session()->put('usuario_id', $lstUsuario[0]->idusuario);
                $request->session()->put('usuario', $lstUsuario[0]->usuario);
                $request->session()->put('usuario_root', $lstUsuario[0]->root);
                $request->session()->put('usuario_nombre', $lstUsuario[0]->nombre . " " . $lstUsuario[0]->apellido);

                $entidad->idusuario = $lstUsuario[0]->idusuario;
                $entidad->actualizarFechaIngreso();

                $entidad->setIPIngreso();

                //Carga los grupos de cuentas de usuario
                $grupo = new Area();
                $aGrupo = $grupo->obtenerAreasDelUsuario($lstUsuario[0]->idusuario);
                $request->session()->put('array_grupos', $aGrupo);

                //Grupo predeterminado
                if (isset($lstUsuario[0]->areapredeterminada) && $lstUsuario[0]->areapredeterminada != "") {
                    $request->session()->put('grupo_id', $lstUsuario[0]->areapredeterminada);
                    $entidadArea = new Area();
                    $entidadArea->obtenerPorId($lstUsuario[0]->areapredeterminada);
                    if ($entidadArea->css != "") {
                        $request->session()->put('grupo_css', $entidadArea->css);
                    } else {
                        $request->session()->put('grupo_css', 0);
                    }

                    if ($entidadArea->logo != "") {
                        $request->session()->put('grupo_logo', $entidadArea->logo);
                    }
                } else {
                    $request->session()->put('grupo_id', $aGrupo[0]->idarea);
                    $entidadArea = new Area();
                    $entidadArea->obtenerPorId($aGrupo[0]->idarea);
                    $request->session()->put('grupo_css', $entidadArea->css);
                    if ($entidadArea->logo != "") {
                        $request->session()->put('grupo_logo', $entidadArea->logo);
                    }
                }





                //$variable_vacia = "";
                //$request->session()->put('vista_menu_predeterminado' $variable_vacia);

                //Carga los permisos del usuario
                $familia = new Patente();
                $aPermisos = $familia->obtenerPatentesDelUsuario(Session::get('grupo_id'));
                if (count($aPermisos) > 0) {
                    $request->session()->put('array_permisos', $aPermisos);
                }
                // print_r($aPermisos);exit;

                //Carga el menu
                $menu = new Menu();
                $aMenu = $menu->obtenerMenuDelGrupo(Session::get('grupo_id'));
                if (count($aMenu) > 0) {
                    $request->session()->put('array_menu', $aMenu);
                }
                //print_r("entra");exit;
                if (Patente::autorizarOperacion('HOMESISTEMA')) {
                    if ($lstUsuario[0]->forzar_cambio_clave == 1) {
                        return redirect("forzar-cambio-clave");
                    } else {
                        $this->log($usuario, "ACCESO CORRECTO");
                        //return view('sistema.index', compact('titulo'));
                        if ($request->root() == "https://comoenusa.com.ar") {
                            return redirect("/admin/productos");
                        } else {
                            return redirect("/");
                        }
                    }
                } else {
                    $this->log($usuario, "ACCESO INCORRECTO");
                    $regIP = new RegistroIP();
                    $regIP->setIP($this->getIP());

                    /*if ($regIP->verificarIP($this->getIP()) >= 20) {
                        exit;
                    }*/

                    $titulo = 'Acceso denegado';
                    $msg["ESTADO"] = MSG_ERROR;
                    $msg["MSG"] = "Credenciales incorrectas";
                    return view('sistema.login', compact('titulo', 'msg'));
                }
            } else {
                $this->log($usuario, "ACCESO INCORRECTO");
                $regIP = new RegistroIP();
                $regIP->setIP($this->getIP());

                /*if ($regIP->verificarIP($this->getIP()) >= 20) {
                    exit;
                }*/

                $titulo = 'Acceso denegado';
                $msg["ESTADO"] = MSG_ERROR;
                $msg["MSG"] = "Credenciales incorrectas";
                return view('sistema.login', compact('titulo', 'msg'));
            }
        } else {
            $this->log($usuario, "ACCESO INCORRECTO");
            $regIP = new RegistroIP();
            $regIP->setIP($this->getIP());

            /*if ($regIP->verificarIP($this->getIP()) >= 20) {
                exit;
            }*/

            $titulo = 'Acceso denegado';
            $msg["ESTADO"] = MSG_ERROR;
            $msg["MSG"] = "Credenciales incorrectas";
            return view('sistema.login', compact('titulo', 'msg'));
        }
    }

    private function tieneSubMenuCargado($aItem, $idMenu)
    {
        foreach ($aItem as $item) {
            //Si es un submenu evalua que tenga permiso
            if ($item->id_padre == $idMenu) {
                return true;
            }
        }
        return false;
    }

    private function log($usuario = "", $tipo = "")
    {
        $ip = $this->getIP();

        fwrite(fopen('/var/www/html/log/log_sistema_depcsuite', 'a+'),  date_format(date_create(), "Y-m-d H:i:s") . "\t\t" . $ip . "\t\t" . $usuario . "\t\t\t\t" . $tipo . "\n");
    }

    private function getIP()
    {
        if (!empty($_SERVER['HTTP_CLIENT_IP']))
            return $_SERVER['HTTP_CLIENT_IP'];

        if (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
            return $_SERVER['HTTP_X_FORWARDED_FOR'];

        return $_SERVER['REMOTE_ADDR'];
    }
}
