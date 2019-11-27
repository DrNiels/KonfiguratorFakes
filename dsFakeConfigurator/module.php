<?php
	class dsFakeConfigurator extends IPSModule {

		public function Create()
		{
			//Never delete this line!
			parent::Create();

			$this->RegisterPropertyInteger('OriginalConfigurator', 0);
		}

		public function Destroy()
		{
			//Never delete this line!
			parent::Destroy();
		}

		public function ApplyChanges()
		{
			//Never delete this line!
			parent::ApplyChanges();
		}

		public function GetConfigurationForm()
		{
			$dsConfiguratorID = $this->ReadPropertyInteger('OriginalConfigurator');
			// The selected configurator does not exist or is no dS configurator
			if (!IPS_InstanceExists($dsConfiguratorID) || (IPS_GetInstance($dsConfiguratorID)['ModuleInfo']['ModuleID'] !== '{7CADC358-60B0-4D91-9825-27E9029B62C4}')) {
				return json_encode([
					'elements' => [
						[
							'type' => 'SelectInstance',
							'name' => 'OriginalConfigurator',
							'caption' => 'Original Configurator'
						]
					]
				]);
			}
			else {
                $form = json_decode(IPS_GetConfigurationForm($dsConfiguratorID), true);
                $form['actions'][1]['values'] = [
					[
						'name' => 'Wohnzimmer',
						'id' => '0000639b',
						'meter' => 'dsM Wohnzimmer / Flur',
						'type' => 'Raum',
						'instanceID' => 0,
						'create' => [
							'moduleID' => '{9176E70A-8E58-9D85-619E-A722B6B6736E}',
							'configuration' => []
						]
					],
					[
						'name' => 'Deckenlampe',
						'id' => '0000639d',
						'parent' => '0000639b',
						'meter' => 'dsM Wohnzimmer / Flur',
						'type' => 'Licht',
						'instanceID' => 0,
						'create' => [
							'moduleID' => '{9176E70A-8E58-9D85-619E-A722B6B6736E}',
							'configuration' => []
						]
					],
					[
						'name' => 'Stehlampe',
						'id' => '00007a24',
						'parent' => '0000639b',
						'meter' => 'dsM Wohnzimmer / Flur',
						'type' => 'Licht',
						'instanceID' => 0,
						'create' => [
							'moduleID' => '{9176E70A-8E58-9D85-619E-A722B6B6736E}',
							'configuration' => []
						]
					]
				];
                return json_encode($form);
            }
		}

	}