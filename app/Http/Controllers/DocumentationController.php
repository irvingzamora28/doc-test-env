<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Faker\Factory as Faker;

class DocumentationController extends Controller
{
    public function home(Request $request)
    {
        $faker = Faker::create();
        $code =
            [
                'success' => false,
                'name'  => $faker->name,
                'error' => [
                    'code' => 12,
                    'message' => 'Campo edad inválido, ingresar un número',
                ],
            ];

        $menu = [
            [
                "target" => "introduccion",
                "label" => "Introducción", "active" => true,
                "entry"   =>  [
                    "title" =>  "Introducción",
                    "description"   =>  "Api Jelou Mom, permite a las marcas una conexión directa con la plataforma de ventas, mediante una serie de pasos:",
                    "code"  => $this->formatJsonString(json_encode($code, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
                    // "code"  => $code
                ]
            ],
            [
                "target" => "registrar-cliente",
                "label" => "Registrar Cliente", "active" => false,
                "entry"   =>  [
                    "title" =>  "Registrar Cliente",
                    "description" => "La marca debere especificar los campos que se requieren para el registro de usuario. Jelou por defecto tiene una lista de campos predeterminados, de igual manera, la marca puede añadir campos personalizados, solo debe proporcionar el nombre del campo y las validaciones.
                        Al enviarse los datos de un cliente, queda a criterio de la marca como verificar si el cliente ya se encuentra registrado en su base de datos y la actualización de los datos, lo exigido de parte de jelou es retornar el ID del usuario registrado, el cual posteriormente sera utilizado para procesar una venta.",
                    "code"  => $this->formatJsonString(json_encode($code, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
                ]
            ]
        ];

        return view('welcome', ["menu" => $menu]);
    }
    /**
     * Format json schema 
     *
     * @param string $json
     * @return string
     */
    function formatJsonString(string $jsonString): string
    {
        $result = '';
        $level = 0;
        $in_quotes = false;
        $in_escape = false;
        $ends_line_level = NULL;
        $json_length = strlen($jsonString);

        for ($i = 0; $i < $json_length; $i++) {
            $char = $jsonString[$i];
            $new_line_level = NULL;
            $post = "";
            if ($ends_line_level !== NULL) {
                $new_line_level = $ends_line_level;
                $ends_line_level = NULL;
            }
            if ($in_escape) {
                $in_escape = false;
            } else if ($char === '"') {
                $in_quotes = !$in_quotes;
            } else if (!$in_quotes) {
                switch ($char) {
                    case '}':
                    case ']':
                        $level--;
                        $ends_line_level = NULL;
                        $new_line_level = $level;
                        break;

                    case '{':
                    case '[':
                        $level++;
                    case ',':
                        $ends_line_level = $level;
                        break;

                    case ':':
                        $post = " ";
                        break;

                    case " ":
                    case "  ":
                    case "\t":
                    case "\n":
                    case "\r":
                        $char = "";
                        $ends_line_level = $new_line_level;
                        $new_line_level = NULL;
                        break;
                }
            } else if ($char === '\\') {
                $in_escape = true;
            }
            if ($new_line_level !== NULL) {
                $result .= "\n" . str_repeat("\t", $new_line_level);
            }
            $result .= $char . $post;
        }

        return $result;
    }
}
