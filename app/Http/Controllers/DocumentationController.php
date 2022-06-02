<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use Faker\Factory as Faker;

// TODO: Al modificar cambios de datos para enviar, regresar el focus al lugar titulo "Datos a enviar" (Se pierde el lugar donde se quedo el usuario)
// TODO: Extraer funciones comunes de DocumentationEntry
class DocumentationController extends Controller
{
    public function home(Request $request)
    {

        $faker = Faker::create();
        $brand = Brand::where("id_brand", "6")->where("status", "A")->with("fieldsBrand", function ($query) {
            $query->where("status", "A")->select(["id_field_brand", "id_brand", "label", "name", "type", "field_type", "value", "additional_information", "status"]);
        })->first(["id_brand", "name", "dynamic_fields", "status"]);

        $data = [];
        foreach ($brand->fieldsBrand as $key => $field) {
            $addInformation = json_decode($field["additional_information"], true);
            $val = key_exists("faker", $addInformation ?? []) ? $addInformation["faker"] : "";
            if ($val != "") {
                $value = $faker->{$val};
                $data[$field["name"]] = $value;
                $inputs[$field["name"]] = [
                    "value" => $field["field_type"] == 'input' ? $value : $field["value"],
                    "field_type" => $field["field_type"]
                ];
            } else {
                $data[$field["name"]] = $field["field_type"] == 'input' ? "default" : json_decode($field["value"], true)[0]["value"];
                $inputs[$field["name"]] = [
                    "value" => $field["field_type"] == 'input' ? "default" : $field["value"],
                    "field_type" => $field["field_type"]
                ];
            }
        }
        $menu = [
            [
                "registrar-cliente" => [
                    "target" => "registrar-cliente",
                    "label" => "Registrar Cliente", "active" => true,
                    "entry"   =>  [
                        "title" =>  "Registrar Cliente",
                        "description" => "Esta ruta recibe los campos indicados en el ejemplo y son validados. Si el cliente no existe se crea un nuevo cliente, si este ya existe en la base de datos se modifica.
                        Se debe retornar el ID del usuario registrado, el cual posteriormente sera utilizado para procesar una venta.",
                        "url"   => "http://127.0.0.1:8001/api/customers/create_edit",
                        "inputs_data"   => $data,
                        "inputs_info"   => $inputs,
                        "data"  => $this->formatJsonString(json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES)),
                        "response"  => ""
                    ]
                ]
            ],
            [
                "registrar-venta" => [
                    "target" => "registrar-venta",
                    "label" => "Registrar Venta", "active" => false,
                    "entry"   =>  [
                        "title" =>  "Registrar Venta",
                        "description" => "La marca debere especificar los campos que se requieren para el registro de usuario. Jelou por defecto tiene una lista de campos predeterminados, de igual manera, la marca puede añadir campos personalizados, solo debe proporcionar el nombre del campo y las validaciones.
                        Al enviarse los datos de un cliente, queda a criterio de la marca como verificar si el cliente ya se encuentra registrado en su base de datos y la actualización de los datos, lo exigido de parte de jelou es retornar el ID del usuario registrado, el cual posteriormente sera utilizado para procesar una venta.",
                        "url"   => "http://127.0.0.1:8001/api/orders/store",
                        "inputs_data"   => $data,
                        "inputs_info"   => $inputs,
                        "data"  => $this->formatJsonString(json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES)),
                        "response"  => ""
                    ]
                ]
            ]
        ];

        // dd($menu);

        return view('welcome', ["menu" => $menu, "showConfiguration" => false]);
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
