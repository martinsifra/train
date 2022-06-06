<?php declare(strict_types = 1);

namespace Train;

abstract class Carriage
{
	protected ?Carriage $previous;

	protected ?Carriage $next;


	abstract public function order(): int;


	public function onAttach(?Carriage $previous, ?Carriage $next): void
	{
		// Change previous and next carriages pointers.
	}


	public function previous(): ?Carriage
	{
		return $this->previous;
	}


	public function next(): ?Carriage
	{
		return $this->next;
	}

}
