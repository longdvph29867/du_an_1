<?php
class ProductController
{
    // public function __construct (private ProductGateway $gateway) {

    // }
    private $productGateway;

    public function __construct(ProductGateway $gateway)
    {
        $this->productGateway = $gateway;
    }

    public function processRequest(string $method, ?string $id): void
    {
        if ($id) {
            $this->processResourcRequest($method, $id);
        } else {
            $this->processCollectionRequest($method);
        };
    }

    private function processResourcRequest(string $method, string $id): void
    {
        switch ($method) {
            case "GET":
                // echo json_encode($itemCart);
                echo json_encode($this->productGateway->getAll($id));

                break;
            case "PUT":
                $itemCart = $this->productGateway->get($id);

                if (!$itemCart) {
                    http_response_code(404);
                    echo json_encode(["message" => "Product not found"]);
                    return;
                }
                $data = (array) json_decode(file_get_contents("php://input", true));
                echo "<pre>";
                print_r($data);

                $errors = $this->getValidationErrors($data, false);
                if (!empty($errors)) {
                    http_response_code(422);
                    echo json_encode(["errors" => $errors]);
                    break;
                }

                $rows = $this->productGateway->update($itemCart, $data);
                echo json_encode([
                    "message" => "Product Cart $id update",
                    "rows" => $rows
                ]);
                break;
            case "DELETE":
                $rows = $this->productGateway->delete($id);
                echo json_encode([
                    "message" => "Product $id deleted",
                    "rows" => $rows
                ]);
                break;
            default:
                http_response_code(405);
                header("Allow: GET, PUT, DELETE");
        }
    }
    private function processCollectionRequest(string $method): void
    {
        switch ($method) {
            case "GET":
                $ma_kh = $_GET['ma_kh'];
                echo json_encode($this->productGateway->getAll($ma_kh));
                break;
            case "POST":
                $data = (array) json_decode(file_get_contents("php://input", true));
                // print_r($data);

                $errors = $this->getValidationErrors($data);
                if (!empty($errors)) {
                    http_response_code(422);
                    echo json_encode(["errors" => $errors]);
                    break;
                }

                $id = $this->productGateway->create($data);

                http_response_code(201);
                echo json_encode([
                    "message" => "Thêm thành công!",
                    "id" => $id
                ]);
                break;
            case "PUT":
                $data = (array) json_decode(file_get_contents("php://input", true));
                $id = $data['ma_gh'];
                $itemCart = $this->productGateway->get($id);
                if (!$itemCart) {
                    http_response_code(404);
                    echo json_encode(["message" => "Product not found"]);
                    return;
                }
                $errors = $this->getValidationErrors($data, false);
                if (!empty($errors)) {
                    http_response_code(422);
                    echo json_encode(["errors" => $errors]);
                    break;
                }

                $updatedRow = $this->productGateway->update($itemCart, $data);
                echo json_encode([
                    "message" => "Cập nhật thành công!",
                    "updatedRow" => $updatedRow
                ]);
                break;
            default:
                http_response_code(405);
                header("Allow: GET, POST");
        }
    }

    private function getValidationErrors(array $data, bool $is_new = true): array
    {
        $errors = [];
        if ($is_new && empty($data['ma_kh'])) {
            $errors[] = "ma_kh is required";
        }

        return $errors;
    }
}
