<?php

namespace App\Controller;

use App\Repository\BrandRepository;
use App\Repository\PromotionRepository;
use App\Service\MetaGenerator;
use App\Service\MetaTemplates;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\ModelRepository;
use App\Repository\ServiceRepository;
use App\Repository\ServiceCategoryRepository;

final class PageController extends AbstractController
{
    #[Route('korporativnym-klientam', name: 'korporativnym_klientam')]
    public function corporateClientsPage(): Response
    {
        return $this->render('page/corporate-clients.html.twig', [
        ]);
    }

    #[Route('/{brandSlug}/', name: 'brand')]
    public function brand(
        string $brandSlug,
        BrandRepository $brandRepo,
        ModelRepository $modelRepo,
        ServiceRepository $serviceRepo,
        ServiceCategoryRepository $serviceCategoryRepository,
        PromotionRepository $promotionRepository,
        MetaTemplates $templates,
        MetaGenerator $generator
    ): Response {
        $serviceCategory = $serviceCategoryRepository->findAllWithServices();
        $promotions = $promotionRepository->findBy(['active' => true]);
        $template = $templates->getTemplate('brand');

        $brand = $brandRepo->findOneBy(['slug' => $brandSlug]);
        if ($brand) {
            $meta = $generator->generate($template, [
                'brand_en' => $brand->getName(),
                'brand_ru' => $brand->getNameRu(),
            ]);
            return $this->render('brand/show.html.twig', [
                'brand' => $brand,
                'promotions' => $promotions,
                'servicesCategory' => $serviceCategory,
                'meta' => $meta,
                'showAllCategories' => true,
                'is_brand' => true,
            ]);
        }
        throw $this->createNotFoundException('Страница не найдена');
    }


    #[Route('/{brandSlug}/{slug}', name: 'brand_model_or_service')]
    public function handleBrandModelOrService(
        string $brandSlug,
        string $slug,
        BrandRepository $brandRepo,
        ModelRepository $modelRepo,
        ServiceRepository $serviceRepo,
        PromotionRepository $promotionRepository,
        MetaTemplates $templates,
        MetaGenerator $generator,
        ServiceCategoryRepository $serviceCategoryRepository,
    ): Response {
        $serviceCategory = $serviceCategoryRepository->findAllWithServices();
        $promotions = $promotionRepository->findBy(['active' => true]);
        $brand = $brandRepo->findOneBy(['slug' => $brandSlug]);
        if (!$brand) {
            throw $this->createNotFoundException('Бренд не найден');
        }

        // Попробуем найти модель
        $model = $modelRepo->findOneBy(['brand' => $brand, 'slug' => $slug]);
        if ($model) {
            $template = $templates->getTemplate('model');
            $meta = $generator->generate($template, [
                'brand_en' => $brand->getName(),
                'brand_ru' => $brand->getNameRu(),
                'model_en' => $model->getNameEn(),
                'model_ru' => $model->getNameRu(),
            ]);
            return $this->render('model/show.html.twig', [
                'brand' => $brand,
                'model' => $model,
                'promotions' => $promotions,
                'meta' => $meta,
                'servicesCategory' => $serviceCategory,
                'showAllCategories' => true,
                'is_model' => true,
            ]);
        }

        // Попробуем найти услугу бренда
        $service = $serviceRepo->findOneBy(['slug' => $slug]);
        if ($service) {
            $template = $templates->getTemplate('service');
            $meta = $generator->generate($template, [
                'brand_en' => $brand->getName(),
                'brand_ru' => $brand->getNameRu(),
                'service_name' => $service->getName(),
            ]);
            return $this->render('service/brand.html.twig', [
                'brand' => $brand,
                'service' => $service,
                'promotions' => $promotions,
                'meta' => $meta,
                'servicesCategory' => $serviceCategory,
                'showAllCategories' => false,
                'is_brand_service' => true,
            ]);
        }

        throw $this->createNotFoundException('Модель или услуга не найдена');
    }

    #[Route('/{brandSlug}/{modelSlug}/{slug}', name: 'model_service')]
    public function handleModelService(
        string $brandSlug,
        string $modelSlug,
        string $slug,
        BrandRepository $brandRepo,
        ModelRepository $modelRepo,
        ServiceRepository $serviceRepo,
        PromotionRepository $promotionRepository,
        MetaTemplates $templates,
        MetaGenerator $generator,
        ServiceCategoryRepository $serviceCategoryRepository,
    ): Response {
        $serviceCategory = $serviceCategoryRepository->findAllWithServices();
        $promotions = $promotionRepository->findBy(['active' => true]);
        $brand = $brandRepo->findOneBy(['slug' => $brandSlug]);
        if (!$brand) {
            throw $this->createNotFoundException('Бренд не найден');
        }
        $model = $modelRepo->findOneBy(['brand' => $brand, 'slug' => $modelSlug]);
        if (!$model) {
            throw $this->createNotFoundException('Модель не найдена');
        }

        // Попробуем найти услугу модели
        $service = $serviceRepo->findOneBy(['slug' => $slug]);
        if ($service) {
            $template = $templates->getTemplate('service_model');
            $meta = $generator->generate($template, [
                'brand_en' => $brand->getName(),
                'brand_ru' => $brand->getNameRu(),
                'model_en' => $model->getNameEn(),
                'model_ru' => $model->getNameRu(),
                'service_name' => $service->getName(),
            ]);
            return $this->render('service/model.html.twig', [
                'brand' => $brand,
                'model' => $model,
                'service' => $service,
                'promotions' => $promotions,
                'meta' => $meta,
                'servicesCategory' => $serviceCategory,
                'showAllCategories' => false,
                'is_model_service' => true,
            ]);
        }

        throw $this->createNotFoundException('Модель или услуга не найдена');
    }



}
