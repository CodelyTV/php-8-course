<?php

interface Printable
{
	public function print(): string;
}

interface Measurable
{
	public function measure(): int;
}

final class Document implements Printable, Measurable
{
	private string $content;

	public function __construct(string $content)
	{
		$this->content = $content;
	}

	public function print(): string
	{
		return $this->content;
	}

	public function measure(): int
	{
		return strlen($this->content);
	}
}

final class Ruler implements Measurable {
	private int $size;

	public function __construct(int $size)
	{
		$this->size = $size;
	}

	public function measure(): int
	{
		return $this->size;
	}
}

function formatIntersection(Printable&Measurable $doc): void
{
	echo "--------------------\n";
	echo "     INTERSECTION   \n";
	echo "--------------------\n";
	echo "Document content: `" . $doc->print() . "` with Length: " . $doc->measure();
}

function formatUnion(Printable|Measurable $value): void
{
	echo "\n\n";
	echo "--------------------\n";
	echo "        UNION       \n";
	echo "--------------------\n";

	if ($value instanceof Printable) {
		echo "Printable: " . $value->print() . "\n";
	}

	if ($value instanceof Measurable) {
		echo "Measurable: " . $value->measure() . "\n";
	}
}

$document = new Document("Hello World");
$ruler = new Ruler(10);

formatIntersection($document);
formatUnion($document);
