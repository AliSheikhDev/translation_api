<?php

namespace App\Http\Controllers;

use App\Models\Translation;
use App\Models\Tag;
use App\Models\TranslationTag;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class TranslationController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json(Translation::all());
    }

    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'locale' => 'required|string|max:10',
            'key' => 'required|string',
            'content' => 'required|string',
            'tags' => 'array',
        ]);

        $translation = Translation::create($validated);

        if (isset($validated['tags'])) {
            foreach ($validated['tags'] as $tag) {
                $tagModel = Tag::firstOrCreate(['name' => $tag]);
                TranslationTag::create([
                    'translation_id' => $translation->id,
                    'tag_id' => $tagModel->id,
                ]);
            }
        }

        return response()->json($translation, 201);
    }

    public function update(Request $request, int $id): JsonResponse
    {
        $translation = Translation::findOrFail($id);
        $translation->update($request->all());
        return response()->json($translation);
    }

    public function destroy(int $id): JsonResponse
    {
        Translation::destroy($id);
        return response()->json(['message' => 'Translation deleted successfully']);
    }

    public function search(Request $request): JsonResponse
    {
        $query = Translation::query();
        if ($request->has('key')) {
            $query->where('key', 'like', '%' . $request->key . '%');
        }
        if ($request->has('content')) {
            $query->where('content', 'like', '%' . $request->content . '%');
        }
        return response()->json($query->get());
    }

    public function export(): JsonResponse
    {
        return response()->json(Translation::all());
    }
}
