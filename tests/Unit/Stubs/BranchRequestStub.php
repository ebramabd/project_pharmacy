<?php

namespace Tests\Unit\Stubs;

use App\Dtos\BranchDto;
use App\Dtos\BranchRequestDto;
use App\Dtos\ProductDto;
use App\Models\Branch;
use App\Models\Product;
use App\Models\Requests_of_product;
use App\Repositories\IBranchRequestRepo;
use Illuminate\Support\Collection;
use PHPUnit\Framework\TestCase;

class BranchRequestStub extends TestCase implements IBranchRequestRepo
{

    private $products = [];

    private $branches = [];

    private Collection $requestsOfProduct;

    public function __construct()
    {
        $pdoProduct = new ProductDto();
        $prod1 = new Product();
        $prod1->prod_id = 1;
        $prod1->prod_name = $pdoProduct->setProdName('prod1');
        $this->products = $prod1;

        $pdoBranch = new BranchDto();
        $bran1 = new Branch();
        $bran1->id = 1;
        $bran1->branch_name = $pdoBranch->setBranchName('branch1');
        $this->branches = $bran1;


        $pdoBranchRequest = new BranchRequestDto();
        $pdoBranchRequest->setBranchId($this->branches->id);
        $pdoBranchRequest->setProdId($this->products->prod_id);
        $pdoBranchRequest->setQuantityOfProduct(20);

        $this->requestsOfProduct = collect([
            (object)[
                'id' => 100,
                'branch_id' => $pdoBranchRequest->getBranchId(),
                'prod_id' => $pdoBranchRequest->getProdId(),
                'quantity_of_prod' => $pdoBranchRequest->getQuantityOfProduct(),
                'accept_or_not'=>'not',
                'prod_name' => $pdoProduct->getProdName(),
                'branch_name' => $pdoBranch->getBranchName(),
            ]
        ]);
    }

    public function getDataForAccept(): Collection
    {
        return $this->requestsOfProduct;
    }

    public function acceptRequestBranch(BranchRequestDto $dto): void
    {
        $this->requestsOfProduct = $this->requestsOfProduct->map(function ($item) use ($dto) {
            $item->accept_or_not = 'accepted';
            return $item;
        });
    }

    public function changeQuantityOfProduct(int $prod_id, int $branch_id, int $quantity_of_prod): void
    {

    }
}
