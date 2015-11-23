/*
Navicat MySQL Data Transfer

Source Server         : LIVE
Source Server Version : 50546
Source Host           : localhost:3306
Source Database       : vlmisr2

Target Server Type    : MYSQL
Target Server Version : 50546
File Encoding         : 65001

Date: 2015-11-23 23:14:42
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for barcode_scanner_warehouses
-- ----------------------------
DROP TABLE IF EXISTS `barcode_scanner_warehouses`;
CREATE TABLE `barcode_scanner_warehouses` (
  `pk_id` int(11) NOT NULL AUTO_INCREMENT,
  `scanner_id` int(11) DEFAULT NULL,
  `warehouse_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`pk_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for barcode_scanners
-- ----------------------------
DROP TABLE IF EXISTS `barcode_scanners`;
CREATE TABLE `barcode_scanners` (
  `pk_id` int(11) NOT NULL AUTO_INCREMENT,
  `scanner_name` varchar(200) DEFAULT NULL,
  `licence_number` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`pk_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for campaign_data
-- ----------------------------
DROP TABLE IF EXISTS `campaign_data`;
CREATE TABLE `campaign_data` (
  `pk_id` int(11) NOT NULL AUTO_INCREMENT,
  `campaign_day` int(11) DEFAULT NULL,
  `daily_target` int(11) DEFAULT NULL,
  `target_age_six_months` int(11) DEFAULT NULL,
  `target_age_sixty_months` int(11) DEFAULT NULL,
  `household_visited` int(11) DEFAULT NULL,
  `multiple_family_household` int(11) DEFAULT NULL,
  `total_coverage` varchar(255) DEFAULT NULL,
  `refusal_covered` varchar(255) DEFAULT NULL,
  `record_reference` varchar(255) DEFAULT NULL,
  `coverage_not_accessible` varchar(255) DEFAULT NULL,
  `record_not_accessible` varchar(255) DEFAULT NULL,
  `record_refusal` varchar(255) DEFAULT NULL,
  `coverage_mobile_children` varchar(255) DEFAULT NULL,
  `reported_with_weakness` varchar(255) DEFAULT NULL,
  `zero_doses` varchar(255) DEFAULT NULL,
  `coverage_reference` varchar(255) DEFAULT NULL,
  `inaccessible_coverage` varchar(255) DEFAULT NULL,
  `teams_reported` int(11) DEFAULT NULL,
  `vials_given` varchar(255) DEFAULT NULL,
  `vials_used` varchar(255) DEFAULT NULL,
  `vials_returned` varchar(255) DEFAULT NULL,
  `vials_expired` varchar(255) DEFAULT NULL,
  `recon_syr_wasted` int(11) DEFAULT NULL,
  `ad_syr_wasted` int(255) DEFAULT NULL,
  `warehouse_id` int(11) NOT NULL,
  `item_pack_size_id` int(11) NOT NULL,
  `campaign_id` int(11) NOT NULL,
  `district_id` int(11) NOT NULL,
  `union_council_id` int(11) NOT NULL,
  `campaign_target_id` int(11) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_by` int(11) NOT NULL,
  `modified_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`pk_id`),
  KEY `campaign_data_campaigns_fk3` (`campaign_id`) USING BTREE,
  KEY `campaign_data_locations_fk4` (`district_id`) USING BTREE,
  KEY `campaign_data_campaign_targets_fk6` (`campaign_target_id`) USING BTREE,
  KEY `campaign_data_users_fk7` (`created_by`) USING BTREE,
  KEY `campaign_data_users_fk8` (`modified_by`) USING BTREE,
  KEY `campaign_data_locations_fk5` (`union_council_id`) USING BTREE,
  KEY `campaign_data_warehouses_fk1` (`warehouse_id`) USING BTREE,
  KEY `campaign_data_item_pack_sizes_fk2` (`item_pack_size_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=5340 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for campaign_districts
-- ----------------------------
DROP TABLE IF EXISTS `campaign_districts`;
CREATE TABLE `campaign_districts` (
  `pk_id` int(11) NOT NULL AUTO_INCREMENT,
  `campaign_id` int(11) NOT NULL,
  `district_id` int(11) NOT NULL,
  PRIMARY KEY (`pk_id`),
  KEY `campaign_districts_campaigns_fk1` (`campaign_id`) USING BTREE,
  KEY `campaign_districts_locations_fk2` (`district_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=548 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for campaign_item_pack_sizes
-- ----------------------------
DROP TABLE IF EXISTS `campaign_item_pack_sizes`;
CREATE TABLE `campaign_item_pack_sizes` (
  `pk_id` int(11) NOT NULL AUTO_INCREMENT,
  `item_pack_size_id` int(11) NOT NULL,
  `campaign_id` int(11) NOT NULL,
  PRIMARY KEY (`pk_id`),
  KEY `campaign_item_pack_sizes_item_pack_sizes_fk1` (`item_pack_size_id`) USING BTREE,
  KEY `campaign_item_pack_sizes_campaigns_fk2` (`campaign_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for campaign_lqas_data
-- ----------------------------
DROP TABLE IF EXISTS `campaign_lqas_data`;
CREATE TABLE `campaign_lqas_data` (
  `pk_id` int(11) NOT NULL AUTO_INCREMENT,
  `surveyor` varchar(255) DEFAULT NULL,
  `checked` varchar(255) DEFAULT NULL,
  `unvaccinated` varchar(255) DEFAULT NULL,
  `remarks` text,
  `campaign_id` int(11) NOT NULL,
  `district_id` int(11) NOT NULL,
  `union_council_id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_by` int(11) NOT NULL,
  `modified_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`pk_id`),
  KEY `campaign_lqas_data_campaigns_fk1` (`campaign_id`) USING BTREE,
  KEY `campaign_lqas_data_locations_fk2` (`district_id`) USING BTREE,
  KEY `campaign_lqas_data_users_fk4` (`created_by`) USING BTREE,
  KEY `campaign_lqas_data_users_fk5` (`modified_by`) USING BTREE,
  KEY `campaign_lqas_data_warehouses_fk3` (`union_council_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for campaign_readiness
-- ----------------------------
DROP TABLE IF EXISTS `campaign_readiness`;
CREATE TABLE `campaign_readiness` (
  `pk_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `vaccine_arrival_date` datetime DEFAULT NULL,
  `dco_attended_meeting` tinyint(1) DEFAULT NULL,
  `edo_attended_meeting` tinyint(1) DEFAULT NULL,
  `all_members_attended_meeting` tinyint(1) DEFAULT NULL,
  `num_tally_sheets` int(11) DEFAULT NULL,
  `num_finger_markers` int(11) DEFAULT NULL,
  `arrival_date_mobilization_material` datetime DEFAULT NULL,
  `dpec_meeting_date` datetime DEFAULT NULL,
  `remarks` text,
  `campaign_id` int(11) NOT NULL,
  `district_id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_by` int(11) NOT NULL,
  `modified_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`pk_id`),
  KEY `campaign_readiness_campaigns_fk1` (`campaign_id`) USING BTREE,
  KEY `campaign_readiness_locations_fk2` (`district_id`) USING BTREE,
  KEY `campaign_readiness_users_fk4` (`modified_by`) USING BTREE,
  KEY `campaign_readiness_users_fk3` (`created_by`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for campaign_readiness_union_council
-- ----------------------------
DROP TABLE IF EXISTS `campaign_readiness_union_council`;
CREATE TABLE `campaign_readiness_union_council` (
  `pk_id` int(11) NOT NULL AUTO_INCREMENT,
  `inaccessible_children` varchar(100) DEFAULT NULL,
  `inaccessible_area` varchar(100) DEFAULT NULL,
  `number_mobile_teams` int(11) DEFAULT NULL,
  `number_fixed_teams` int(11) DEFAULT NULL,
  `number_transit_points` int(11) DEFAULT NULL,
  `aic_trained` int(11) DEFAULT NULL,
  `number_teams_trained` int(11) DEFAULT NULL,
  `mobile_population_areas` int(11) DEFAULT NULL,
  `upec_meeting_date` datetime DEFAULT NULL,
  `union_council_id` int(11) NOT NULL,
  `campaign_id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_by` int(11) NOT NULL,
  `modified_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`pk_id`),
  KEY `campaign_readiness_union_council_users_fk3` (`created_by`) USING BTREE,
  KEY `campaign_readiness_union_council_users_fk4` (`modified_by`) USING BTREE,
  KEY `campaign_readiness_union_council_campaigns_fk2` (`campaign_id`) USING BTREE,
  KEY `campaign_readiness_union_council_warehouses_fk1` (`union_council_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for campaign_targets
-- ----------------------------
DROP TABLE IF EXISTS `campaign_targets`;
CREATE TABLE `campaign_targets` (
  `pk_id` int(11) NOT NULL AUTO_INCREMENT,
  `daily_target` int(11) DEFAULT NULL,
  `campaign_id` int(11) NOT NULL,
  `warehouse_id` int(11) NOT NULL,
  `item_pack_size_id` int(11) NOT NULL DEFAULT '0',
  `created_by` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_by` int(11) NOT NULL,
  `modified_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`pk_id`),
  KEY `campaign_targets_campaigns_fk1` (`campaign_id`) USING BTREE,
  KEY `campaign_targets_users_fk3` (`created_by`) USING BTREE,
  KEY `campaign_targets_users_fk4` (`modified_by`) USING BTREE,
  KEY `campaign_targets_locations_fk2` (`warehouse_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2286 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for campaign_types
-- ----------------------------
DROP TABLE IF EXISTS `campaign_types`;
CREATE TABLE `campaign_types` (
  `pk_id` int(11) NOT NULL AUTO_INCREMENT,
  `camapign_type_name` varchar(100) DEFAULT NULL,
  `list_rank` int(11) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_by` int(11) NOT NULL,
  `modified_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`pk_id`),
  KEY `campaign_types_users_fk1` (`created_by`) USING BTREE,
  KEY `campaign_types_users_fk2` (`modified_by`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for campaigns
-- ----------------------------
DROP TABLE IF EXISTS `campaigns`;
CREATE TABLE `campaigns` (
  `pk_id` int(11) NOT NULL AUTO_INCREMENT,
  `campaign_name` varchar(100) DEFAULT NULL,
  `date_from` datetime DEFAULT NULL,
  `date_to` datetime DEFAULT NULL,
  `catch_up_days` int(11) DEFAULT NULL,
  `is_closed` tinyint(1) NOT NULL,
  `campaign_type_id` int(11) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_by` int(11) NOT NULL,
  `modified_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`pk_id`),
  KEY `campaigns_campaign_types_fk1` (`campaign_type_id`) USING BTREE,
  KEY `campaigns_users_fk3` (`created_by`) USING BTREE,
  KEY `campaigns_users_fk4` (`modified_by`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for ccm_asset_types
-- ----------------------------
DROP TABLE IF EXISTS `ccm_asset_types`;
CREATE TABLE `ccm_asset_types` (
  `pk_id` int(11) NOT NULL AUTO_INCREMENT,
  `asset_type_name` varchar(100) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1' COMMENT '0=inactive, 1=active',
  `parent_id` int(11) DEFAULT NULL,
  `ccm_equipment_type_id` int(11) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_by` int(11) NOT NULL,
  `modified_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`pk_id`),
  KEY `ccm_asset_types_ccm_equipment_types_fk1` (`ccm_equipment_type_id`) USING BTREE,
  KEY `ccm_asset_types_user_fk2` (`created_by`) USING BTREE,
  KEY `ccm_asset_types_user_fk3` (`modified_by`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for ccm_cold_rooms
-- ----------------------------
DROP TABLE IF EXISTS `ccm_cold_rooms`;
CREATE TABLE `ccm_cold_rooms` (
  `pk_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `cooling_system` int(11) DEFAULT NULL,
  `has_voltage` tinyint(1) DEFAULT NULL,
  `ccm_asset_sub_type_id` int(11) DEFAULT NULL,
  `ccm_id` int(11) NOT NULL,
  `temperature_recording_system` int(11) DEFAULT NULL,
  `type_recording_system` int(11) DEFAULT NULL,
  `refrigerator_gas_type` int(11) DEFAULT NULL,
  `backup_generator` int(11) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_by` int(11) NOT NULL,
  `modified_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`pk_id`),
  KEY `ccm_cold_rooms_ccm_asset_types_fk1` (`ccm_asset_sub_type_id`) USING BTREE,
  KEY `ccm_cold_rooms_coldchain_fk2` (`ccm_id`) USING BTREE,
  KEY `ccm_cold_rooms_users_fk7` (`created_by`) USING BTREE,
  KEY `ccm_cold_rooms_users_fk8` (`modified_by`) USING BTREE,
  KEY `ccm_cold_rooms_temperature_recording_system__list_detail_fk3` (`temperature_recording_system`) USING BTREE,
  KEY `ccm_cold_rooms_type_recording_system_list_detail_fk4` (`type_recording_system`) USING BTREE,
  KEY `ccm_cold_rooms_refrigerator_gas_type_list_detail_fk5` (`refrigerator_gas_type`) USING BTREE,
  KEY `ccm_cold_rooms_backup_generator_list_detail_fk6` (`backup_generator`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=366 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for ccm_generators
-- ----------------------------
DROP TABLE IF EXISTS `ccm_generators`;
CREATE TABLE `ccm_generators` (
  `pk_id` int(11) NOT NULL AUTO_INCREMENT,
  `power_source` int(11) NOT NULL,
  `power_rating` varchar(50) DEFAULT NULL,
  `automatic_start_mechanism` tinyint(1) DEFAULT NULL,
  `use_for` varchar(50) DEFAULT NULL,
  `ccm_id` int(11) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_by` int(11) NOT NULL,
  `modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`pk_id`),
  KEY `ccm_generator_users_fk3` (`created_by`) USING BTREE,
  KEY `ccm_generator_users_fk4` (`modified_by`) USING BTREE,
  KEY `ccm_generator_cold_chain_fk2` (`ccm_id`) USING BTREE,
  KEY `ccm_generator_list_detail_fk1` (`power_source`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=1972 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for ccm_history
-- ----------------------------
DROP TABLE IF EXISTS `ccm_history`;
CREATE TABLE `ccm_history` (
  `pk_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `quantity` int(11) DEFAULT NULL,
  `action` int(11) NOT NULL,
  `warehouse_id` int(11) NOT NULL,
  `ccm_id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  PRIMARY KEY (`pk_id`),
  KEY `ccm_history_warehouses_fk2` (`warehouse_id`) USING BTREE,
  KEY `ccm_history_cold_chain_fk3` (`ccm_id`) USING BTREE,
  KEY `ccm_history_users_fk4` (`created_by`) USING BTREE,
  KEY `ccm_history_list_detail_fk1` (`action`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=56210 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for ccm_human_resources
-- ----------------------------
DROP TABLE IF EXISTS `ccm_human_resources`;
CREATE TABLE `ccm_human_resources` (
  `pk_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `designation` varchar(50) DEFAULT NULL,
  `mobile_number` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `log_date` datetime DEFAULT NULL,
  `ccm_person_type` int(11) NOT NULL,
  PRIMARY KEY (`pk_id`),
  KEY `ccm_human_resources_list_detail_fk1` (`ccm_person_type`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for ccm_makes
-- ----------------------------
DROP TABLE IF EXISTS `ccm_makes`;
CREATE TABLE `ccm_makes` (
  `pk_id` int(11) NOT NULL AUTO_INCREMENT,
  `ccm_make_name` varchar(100) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1' COMMENT '0=inactive, 1=active',
  `created_by` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_by` int(11) NOT NULL,
  `modified_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`pk_id`),
  KEY `ccm_make_users_fk1` (`created_by`) USING BTREE,
  KEY `ccm_make_users_fk2` (`modified_by`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=704 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for ccm_models
-- ----------------------------
DROP TABLE IF EXISTS `ccm_models`;
CREATE TABLE `ccm_models` (
  `pk_id` int(11) NOT NULL AUTO_INCREMENT,
  `ccm_model_name` varchar(100) DEFAULT NULL,
  `asset_dimension_length` int(11) DEFAULT NULL,
  `asset_dimension_width` int(11) DEFAULT NULL,
  `asset_dimension_height` int(11) DEFAULT NULL,
  `gross_capacity_20` double DEFAULT NULL,
  `gross_capacity_4` double DEFAULT NULL,
  `net_capacity_20` double DEFAULT NULL,
  `net_capacity_4` double DEFAULT NULL,
  `cfc_free` tinyint(1) DEFAULT NULL,
  `gas_type` int(11) DEFAULT NULL,
  `no_of_phases` tinyint(1) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1' COMMENT '0=inactive, 1=active, 2=draft',
  `reasons` varchar(100) DEFAULT '',
  `utilizations` varchar(100) DEFAULT NULL,
  `temperature_type` tinyint(1) DEFAULT NULL COMMENT '0=positive, 1=negative, 2=both',
  `catalogue_id` varchar(50) DEFAULT NULL,
  `ccm_make_id` int(11) DEFAULT NULL,
  `ccm_asset_type_id` int(11) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_by` int(11) NOT NULL,
  `modified_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `cold_life` varchar(50) DEFAULT NULL COMMENT 'cold life without opening',
  `product_price` int(11) DEFAULT NULL,
  `power_source` int(11) DEFAULT NULL,
  `internal_dimension_length` int(11) DEFAULT NULL,
  `internal_dimension_width` int(11) DEFAULT NULL,
  `internal_dimension_height` int(11) DEFAULT NULL,
  `storage_dimension_length` int(11) DEFAULT NULL,
  `storage_dimension_width` int(11) DEFAULT NULL,
  `storage_dimension_height` int(11) DEFAULT NULL,
  `is_pqs` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`pk_id`),
  KEY `ccm_models_users_fk5` (`modified_by`) USING BTREE,
  KEY `ccm_models_users_fk4` (`created_by`) USING BTREE,
  KEY `ccm_models_ccm_makes_fk2` (`ccm_make_id`) USING BTREE,
  KEY `ccm_models_ccm_asset_types_fk3` (`ccm_asset_type_id`) USING BTREE,
  KEY `ccm_models_list_detail_fk1` (`gas_type`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=13951 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for ccm_status_history
-- ----------------------------
DROP TABLE IF EXISTS `ccm_status_history`;
CREATE TABLE `ccm_status_history` (
  `pk_id` int(11) NOT NULL AUTO_INCREMENT,
  `temperature_alarm` int(11) DEFAULT NULL,
  `working_quantity` int(11) DEFAULT NULL,
  `comments` text,
  `status_date` datetime DEFAULT NULL,
  `ccm_id` int(11) NOT NULL,
  `warehouse_id` int(11) NOT NULL,
  `ccm_status_list_id` int(11) DEFAULT NULL,
  `ccm_asset_type_id` int(11) DEFAULT NULL,
  `reason_id` int(11) DEFAULT NULL,
  `utilization_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`pk_id`),
  KEY `ccm_status_history_warehouses_fk2` (`warehouse_id`) USING BTREE,
  KEY `ccm_status_history_ccm_status_list_fk3` (`ccm_status_list_id`) USING BTREE,
  KEY `ccm_status_history_ccm_asset_types_fk4` (`ccm_asset_type_id`) USING BTREE,
  KEY `ccm_status_history_ccm_status_list_pk_id_fk5` (`reason_id`) USING BTREE,
  KEY `ccm_status_history_cold_chain_fk1` (`ccm_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=98173 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for ccm_status_list
-- ----------------------------
DROP TABLE IF EXISTS `ccm_status_list`;
CREATE TABLE `ccm_status_list` (
  `pk_id` int(11) NOT NULL AUTO_INCREMENT,
  `ccm_status_list_name` varchar(100) DEFAULT NULL,
  `type` tinyint(4) DEFAULT NULL,
  `reason_type` tinyint(1) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1' COMMENT '0=inactive, 1=active',
  `created_by` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_by` int(11) NOT NULL,
  `modified_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`pk_id`),
  KEY `ccm_status_list_users_fk1` (`created_by`) USING BTREE,
  KEY `ccm_status_list_users_fk2` (`modified_by`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for ccm_transfer_history
-- ----------------------------
DROP TABLE IF EXISTS `ccm_transfer_history`;
CREATE TABLE `ccm_transfer_history` (
  `pk_id` int(11) NOT NULL AUTO_INCREMENT,
  `quantity` int(11) DEFAULT NULL,
  `transfer_date` datetime DEFAULT NULL,
  `ccm_id` int(11) NOT NULL,
  `from_warehouse_id` int(11) NOT NULL,
  `to_warehouse_id` int(11) NOT NULL,
  `ccm_status_list_id` int(11) NOT NULL,
  `transfer_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`pk_id`),
  KEY `ccm_transfer_history_cold_chain_fk1` (`ccm_id`) USING BTREE,
  KEY `ccm_transfer_history_warehouses_fk2` (`from_warehouse_id`) USING BTREE,
  KEY `ccm_transfer_history_warehouses_fk3` (`to_warehouse_id`) USING BTREE,
  KEY `ccm_transfer_history_ccm_status_list_fk4` (`ccm_status_list_id`) USING BTREE,
  KEY `ccm_transfer_history_users_fk5` (`transfer_by`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for ccm_vehicles
-- ----------------------------
DROP TABLE IF EXISTS `ccm_vehicles`;
CREATE TABLE `ccm_vehicles` (
  `pk_id` int(11) NOT NULL AUTO_INCREMENT,
  `registration_no` varchar(100) DEFAULT NULL,
  `used_for_epi` int(11) DEFAULT NULL,
  `comments` text,
  `ccm_id` int(11) DEFAULT NULL,
  `ccm_asset_sub_type_id` int(11) DEFAULT NULL COMMENT 'its list_detail_id',
  `fuel_type_id` int(11) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `modified_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`pk_id`),
  KEY `ccm_vechicles_cold_chain_fk1` (`ccm_id`) USING BTREE,
  KEY `ccm_vechicles_users_fk4` (`created_by`) USING BTREE,
  KEY `ccm_vechicles_users_fk5` (`modified_by`) USING BTREE,
  KEY `ccm_vechicles_fuel_type_id_list_detail_fk3` (`fuel_type_id`) USING BTREE,
  KEY `ccm_vechicles_ccm_asset_types_fk2` (`ccm_asset_sub_type_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=9468 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for ccm_voltage_regulators
-- ----------------------------
DROP TABLE IF EXISTS `ccm_voltage_regulators`;
CREATE TABLE `ccm_voltage_regulators` (
  `pk_id` int(11) NOT NULL AUTO_INCREMENT,
  `nominal_voltage` int(11) DEFAULT NULL,
  `continous_power` int(11) DEFAULT NULL,
  `frequency` varchar(50) DEFAULT NULL,
  `input_voltage_range` varchar(50) DEFAULT NULL,
  `output_voltage_range` varchar(50) DEFAULT NULL,
  `ccm_id` int(11) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_by` int(11) NOT NULL,
  `modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`pk_id`),
  KEY `ccm_generator_users_fk3` (`created_by`) USING BTREE,
  KEY `ccm_generator_users_fk4` (`modified_by`) USING BTREE,
  KEY `ccm_generator_cold_chain_fk2` (`ccm_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for ccm_warehouses
-- ----------------------------
DROP TABLE IF EXISTS `ccm_warehouses`;
CREATE TABLE `ccm_warehouses` (
  `pk_id` int(11) NOT NULL AUTO_INCREMENT,
  `routine_immunization_icepack_requirments` varchar(100) DEFAULT NULL,
  `campaign_icepack_requirments` varchar(100) DEFAULT NULL,
  `electricity_availability_id` int(11) NOT NULL,
  `warehouse_id` int(11) NOT NULL,
  `vaccine_supply_mode` int(11) NOT NULL,
  PRIMARY KEY (`pk_id`),
  KEY `ccm_warehouses_warehouses_fk1` (`warehouse_id`) USING BTREE,
  KEY `ccm_warehouses_list_detail_fk2` (`electricity_availability_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=13121 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for ccm_warehouses_solar_energy
-- ----------------------------
DROP TABLE IF EXISTS `ccm_warehouses_solar_energy`;
CREATE TABLE `ccm_warehouses_solar_energy` (
  `pk_id` int(11) NOT NULL AUTO_INCREMENT,
  `ccm_warehouse_id` int(11) DEFAULT NULL,
  `solar_energy_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`pk_id`),
  KEY `ccm_warehouses_solar_energy_ccm_warehouses_fk1` (`ccm_warehouse_id`) USING BTREE,
  KEY `ccm_warehouses_solar_energy_list_detail_fk2` (`solar_energy_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for ccm_warehouses_vaccination_staff
-- ----------------------------
DROP TABLE IF EXISTS `ccm_warehouses_vaccination_staff`;
CREATE TABLE `ccm_warehouses_vaccination_staff` (
  `pk_id` int(11) NOT NULL AUTO_INCREMENT,
  `ccm_warehouse_id` int(11) DEFAULT NULL,
  `vaccination_staff_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`pk_id`),
  KEY `ccm_warehouses_vaccination_staff_ccm_warehouses_fk1` (`ccm_warehouse_id`) USING BTREE,
  KEY `ccm_warehouses_vaccination_staff_list_detail_fk2` (`vaccination_staff_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for cold_chain
-- ----------------------------
DROP TABLE IF EXISTS `cold_chain`;
CREATE TABLE `cold_chain` (
  `pk_id` int(11) NOT NULL AUTO_INCREMENT,
  `asset_id` varchar(50) DEFAULT NULL,
  `auto_asset_id` int(11) DEFAULT NULL,
  `serial_number` varchar(100) DEFAULT NULL,
  `estimate_life` smallint(6) DEFAULT NULL,
  `working_since` datetime DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `manufacture_year` datetime DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1' COMMENT '0=inactive, 1=active',
  `ccm_status_history_id` int(11) DEFAULT NULL,
  `ccm_asset_type_id` int(11) DEFAULT NULL,
  `ccm_model_id` int(11) DEFAULT '0',
  `source_id` int(11) DEFAULT NULL,
  `warehouse_id` int(11) DEFAULT NULL,
  `approved_by` int(11) DEFAULT NULL,
  `approved_on` datetime DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `temperature_monitor` int(11) DEFAULT NULL,
  PRIMARY KEY (`pk_id`),
  KEY `cold_chain_ccm_asset_types_fk2` (`ccm_asset_type_id`) USING BTREE,
  KEY `cold_chain_ccm_models_fk3` (`ccm_model_id`) USING BTREE,
  KEY `cold_chain_warehouses_fk5` (`warehouse_id`) USING BTREE,
  KEY `cold_chain_users_fk6` (`created_by`) USING BTREE,
  KEY `cold_chain_stakeholders_fk4` (`source_id`) USING BTREE,
  KEY `cold_chain_ccm_status_history_fk1` (`ccm_status_history_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=93419 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for distribution_plan
-- ----------------------------
DROP TABLE IF EXISTS `distribution_plan`;
CREATE TABLE `distribution_plan` (
  `pk_id` int(11) NOT NULL AUTO_INCREMENT,
  `sender_warehouse_id` int(11) DEFAULT NULL,
  `receiver_warehouse_id` int(11) DEFAULT NULL,
  `level` tinyint(2) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `stakeholder_activity_id` int(11) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`pk_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7280 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for document_categories
-- ----------------------------
DROP TABLE IF EXISTS `document_categories`;
CREATE TABLE `document_categories` (
  `pk_id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) DEFAULT NULL,
  `category_title` varchar(100) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`pk_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for documents
-- ----------------------------
DROP TABLE IF EXISTS `documents`;
CREATE TABLE `documents` (
  `pk_id` int(11) NOT NULL AUTO_INCREMENT,
  `doc_title` varchar(200) DEFAULT NULL,
  `doc_path` varchar(1000) DEFAULT NULL,
  `doc_category_id` int(11) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`pk_id`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for epi_amc
-- ----------------------------
DROP TABLE IF EXISTS `epi_amc`;
CREATE TABLE `epi_amc` (
  `pk_id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) DEFAULT NULL,
  `amc` decimal(10,0) DEFAULT NULL,
  `warehouse_id` int(11) DEFAULT NULL,
  `amc_year` int(11) DEFAULT NULL,
  `remarks` varchar(255) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  PRIMARY KEY (`pk_id`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for fav_graph_settings
-- ----------------------------
DROP TABLE IF EXISTS `fav_graph_settings`;
CREATE TABLE `fav_graph_settings` (
  `user` varchar(100) DEFAULT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sel_user` varchar(100) DEFAULT NULL,
  `period` varchar(25) DEFAULT NULL,
  `sel_stakeholder` varchar(100) DEFAULT NULL,
  `year` varchar(100) DEFAULT NULL,
  `arrproducts` text,
  `compare_opt` varchar(50) DEFAULT NULL,
  `optvals` varchar(50) DEFAULT NULL,
  `arryearcomp` text,
  `arrstakecomp` text,
  `titles` text,
  `allfiles` text,
  `col` varchar(200) DEFAULT NULL,
  `unit` varchar(100) DEFAULT NULL,
  `xaxis` varchar(100) DEFAULT NULL,
  `ctype` varchar(100) DEFAULT NULL,
  `rep_title1` varchar(100) DEFAULT NULL,
  `rep_title2` varchar(100) DEFAULT NULL,
  `rep_title3` varchar(100) DEFAULT NULL,
  `rep_logo` varchar(100) DEFAULT NULL,
  `period_lable` varchar(100) DEFAULT NULL,
  `comparison_title` varchar(100) DEFAULT NULL,
  `arrgroupcomp` text,
  `count1` int(5) DEFAULT NULL,
  `log_type` enum('Graph','Report') DEFAULT NULL,
  `arrparam` text,
  `arrleftcol` text,
  `leftcol` varchar(5) DEFAULT NULL,
  `arrprovinces` text,
  `arrdistricts` text,
  `provinces` text,
  `districts` text,
  `sel_prov` int(2) DEFAULT NULL,
  `rep_desc` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for future_arrivals
-- ----------------------------
DROP TABLE IF EXISTS `future_arrivals`;
CREATE TABLE `future_arrivals` (
  `pk_id` int(11) NOT NULL AUTO_INCREMENT,
  `voucher_number` varchar(50) DEFAULT NULL,
  `transaction_counter` int(11) DEFAULT NULL,
  `expected_arrival_date` datetime DEFAULT NULL,
  `reference_number` varchar(100) DEFAULT NULL,
  `stakeholder_activity_id` int(11) DEFAULT NULL,
  `description` text,
  `item_pack_size_id` int(11) DEFAULT NULL COMMENT 'manufacture_item_id for history',
  `batch_number` varchar(255) DEFAULT NULL,
  `production_date` datetime DEFAULT NULL,
  `expiry_date` datetime DEFAULT NULL,
  `manufacturer_id` int(11) DEFAULT NULL,
  `vvm_type_id` int(11) DEFAULT NULL,
  `unit_price` float DEFAULT NULL,
  `quantity` int(11) NOT NULL DEFAULT '0',
  `received_quantity` int(11) DEFAULT '0',
  `from_warehouse_id` int(11) NOT NULL,
  `to_warehouse_id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` datetime DEFAULT NULL,
  PRIMARY KEY (`pk_id`),
  KEY `stock_master_transaction_types_fk1` (`unit_price`),
  KEY `stock_master_warehouses_fk2` (`quantity`),
  KEY `stock_master_warehouses_fk3` (`received_quantity`),
  KEY `stock_master_users_fk4` (`created_by`),
  KEY `stock_master_ibfk_1` (`stakeholder_activity_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for future_arrivals_draft
-- ----------------------------
DROP TABLE IF EXISTS `future_arrivals_draft`;
CREATE TABLE `future_arrivals_draft` (
  `pk_id` int(11) NOT NULL AUTO_INCREMENT,
  `expected_arrival_date` datetime DEFAULT NULL,
  `reference_number` varchar(100) DEFAULT NULL,
  `stakeholder_activity_id` int(11) DEFAULT NULL,
  `description` text,
  `item_pack_size_id` int(11) DEFAULT NULL COMMENT 'manufacture_item_id for history',
  `batch_number` varchar(255) DEFAULT NULL,
  `production_date` datetime DEFAULT NULL,
  `expiry_date` datetime DEFAULT NULL,
  `manufacturer_id` int(11) DEFAULT NULL,
  `vvm_type_id` int(11) DEFAULT NULL,
  `unit_price` float DEFAULT NULL,
  `quantity` int(11) NOT NULL DEFAULT '0',
  `from_warehouse_id` int(11) NOT NULL,
  `to_warehouse_id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` datetime DEFAULT NULL,
  PRIMARY KEY (`pk_id`),
  KEY `stock_master_transaction_types_fk1` (`unit_price`),
  KEY `stock_master_warehouses_fk2` (`quantity`),
  KEY `stock_master_users_fk4` (`created_by`),
  KEY `stock_master_ibfk_1` (`stakeholder_activity_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for gatepass_detail
-- ----------------------------
DROP TABLE IF EXISTS `gatepass_detail`;
CREATE TABLE `gatepass_detail` (
  `pk_id` int(11) NOT NULL AUTO_INCREMENT,
  `quantity` varchar(255) DEFAULT NULL,
  `stock_detail_id` int(11) DEFAULT NULL,
  `gatepass_master_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`pk_id`),
  KEY `gatepass_detail_gatepass_master_fk2` (`gatepass_master_id`) USING BTREE,
  KEY `gatepass_detail_stock_detail_fk1` (`stock_detail_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for gatepass_master
-- ----------------------------
DROP TABLE IF EXISTS `gatepass_master`;
CREATE TABLE `gatepass_master` (
  `pk_id` int(11) NOT NULL AUTO_INCREMENT,
  `number` varchar(100) DEFAULT NULL,
  `transaction_date` datetime DEFAULT NULL,
  `gatepass_vehicle_id` int(11) NOT NULL,
  `warehouse_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`pk_id`),
  KEY `gatepass_master_gatepass_vehicle_fk1` (`gatepass_vehicle_id`) USING BTREE,
  KEY `gatepass_master_gatepass_warehouses_fk2` (`warehouse_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for gatepass_vehicles
-- ----------------------------
DROP TABLE IF EXISTS `gatepass_vehicles`;
CREATE TABLE `gatepass_vehicles` (
  `pk_id` int(11) NOT NULL AUTO_INCREMENT,
  `number` varchar(255) DEFAULT NULL,
  `vehicle_type_id` int(11) NOT NULL,
  PRIMARY KEY (`pk_id`),
  KEY `gatepass_vehicles_list_detail_fk1` (`vehicle_type_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for geo_color
-- ----------------------------
DROP TABLE IF EXISTS `geo_color`;
CREATE TABLE `geo_color` (
  `pk_id` int(11) NOT NULL AUTO_INCREMENT,
  `color_code` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`pk_id`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for geo_indicator_values
-- ----------------------------
DROP TABLE IF EXISTS `geo_indicator_values`;
CREATE TABLE `geo_indicator_values` (
  `id` int(11) NOT NULL,
  `geo_indicator_id` int(11) DEFAULT NULL,
  `start_value` varchar(255) DEFAULT NULL,
  `end_value` varchar(255) DEFAULT NULL,
  `interval` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `geo_color_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for geo_indicators
-- ----------------------------
DROP TABLE IF EXISTS `geo_indicators`;
CREATE TABLE `geo_indicators` (
  `pk_id` int(11) NOT NULL AUTO_INCREMENT,
  `geo_indicator_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`pk_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for geo_levels
-- ----------------------------
DROP TABLE IF EXISTS `geo_levels`;
CREATE TABLE `geo_levels` (
  `pk_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'distribution level id',
  `geo_level_name` varchar(100) DEFAULT NULL,
  `description` text,
  `status` tinyint(1) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` datetime DEFAULT NULL,
  `modified_by` int(11) NOT NULL,
  `modified_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`pk_id`),
  KEY `geo_levels_users_fk1` (`created_by`),
  KEY `geo_levels_users_fk2` (`modified_by`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COMMENT='distribution level like district, province, national';

-- ----------------------------
-- Table structure for geo_locations
-- ----------------------------
DROP TABLE IF EXISTS `geo_locations`;
CREATE TABLE `geo_locations` (
  `pk_id` int(11) NOT NULL AUTO_INCREMENT,
  `gis_id` int(11) DEFAULT NULL,
  `location_id` int(11) DEFAULT NULL,
  `geo_map_id` int(11) DEFAULT NULL,
  `geo_level_id` int(11) DEFAULT NULL,
  `stakeholder_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`pk_id`),
  KEY `geo_locations_locations_fk1` (`location_id`) USING BTREE,
  KEY `geo_locations_geo_levels_fk3` (`geo_level_id`) USING BTREE,
  KEY `geo_locations_geo_maps_fk2` (`geo_map_id`) USING BTREE,
  KEY `geo_locations_stakeholders_fk4` (`stakeholder_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for geo_maps
-- ----------------------------
DROP TABLE IF EXISTS `geo_maps`;
CREATE TABLE `geo_maps` (
  `pk_id` int(11) NOT NULL AUTO_INCREMENT,
  `classification` varchar(100) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `no_of_classes` int(11) DEFAULT NULL,
  `resource_id` int(11) NOT NULL,
  PRIMARY KEY (`pk_id`),
  KEY `geo_maps_resources_fk1` (`resource_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for help_messages
-- ----------------------------
DROP TABLE IF EXISTS `help_messages`;
CREATE TABLE `help_messages` (
  `pk_id` int(11) NOT NULL AUTO_INCREMENT,
  `description` text,
  `resource_id` int(11) DEFAULT NULL,
  `status` int(2) DEFAULT NULL COMMENT '0=deactive, 1=active, 2=deleted',
  PRIMARY KEY (`pk_id`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for hf_data_detail
-- ----------------------------
DROP TABLE IF EXISTS `hf_data_detail`;
CREATE TABLE `hf_data_detail` (
  `pk_id` int(11) NOT NULL AUTO_INCREMENT,
  `fixed_inside_uc_male` decimal(10,0) DEFAULT NULL,
  `fixed_inside_uc_female` decimal(10,0) DEFAULT NULL,
  `fixed_outside_uc_male` decimal(10,0) DEFAULT NULL,
  `fixed_outside_uc_female` decimal(10,0) DEFAULT NULL,
  `referal_male` decimal(10,0) DEFAULT NULL,
  `referal_female` decimal(10,0) DEFAULT NULL,
  `outreach_male` decimal(10,0) DEFAULT NULL,
  `outreach_female` decimal(10,0) DEFAULT NULL,
  `pregnant_women` decimal(10,0) DEFAULT NULL,
  `non_pregnant_women` decimal(10,0) DEFAULT NULL,
  `age_group_id` int(11) DEFAULT NULL,
  `vaccine_schedule_id` int(11) DEFAULT NULL,
  `hf_data_master_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`pk_id`)
) ENGINE=InnoDB AUTO_INCREMENT=601545 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for hf_data_detail_draft
-- ----------------------------
DROP TABLE IF EXISTS `hf_data_detail_draft`;
CREATE TABLE `hf_data_detail_draft` (
  `pk_id` int(11) NOT NULL AUTO_INCREMENT,
  `fixed_inside_uc_male` decimal(10,0) DEFAULT NULL,
  `fixed_inside_uc_female` decimal(10,0) DEFAULT NULL,
  `fixed_outside_uc_male` decimal(10,0) DEFAULT NULL,
  `fixed_outside_uc_female` decimal(10,0) DEFAULT NULL,
  `referal_male` decimal(10,0) DEFAULT NULL,
  `referal_female` decimal(10,0) DEFAULT NULL,
  `outreach_male` decimal(10,0) DEFAULT NULL,
  `outreach_female` decimal(10,0) DEFAULT NULL,
  `pregnant_women` decimal(10,0) DEFAULT NULL,
  `non_pregnant_women` decimal(10,0) DEFAULT NULL,
  `age_group_id` int(11) DEFAULT NULL,
  `vaccine_schedule_id` int(11) DEFAULT NULL,
  `hf_data_master_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`pk_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7452735 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for hf_data_master
-- ----------------------------
DROP TABLE IF EXISTS `hf_data_master`;
CREATE TABLE `hf_data_master` (
  `pk_id` int(11) NOT NULL AUTO_INCREMENT,
  `opening_balance` int(11) DEFAULT NULL,
  `received_balance` int(11) DEFAULT NULL,
  `issue_balance` int(11) DEFAULT NULL,
  `closing_balance` int(11) DEFAULT NULL,
  `wastages` int(11) DEFAULT NULL,
  `vials_used` int(11) DEFAULT NULL,
  `adjustments` int(11) DEFAULT NULL,
  `reporting_start_date` datetime DEFAULT NULL,
  `nearest_expiry` datetime DEFAULT NULL,
  `item_pack_size_id` int(11) DEFAULT NULL,
  `warehouse_id` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `children_live_birth` int(11) DEFAULT NULL,
  `surviving_children_0_11` int(11) DEFAULT NULL,
  `children_aged_12_23` int(11) DEFAULT NULL,
  `pregnant_women` int(11) DEFAULT NULL,
  `item_amc` int(11) DEFAULT NULL,
  `cbas` int(11) DEFAULT NULL,
  PRIMARY KEY (`pk_id`),
  KEY `warehouse_id` (`warehouse_id`),
  KEY `warehouses_data_ibfk_1` (`item_pack_size_id`)
) ENGINE=InnoDB AUTO_INCREMENT=264780 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for hf_data_master_draft
-- ----------------------------
DROP TABLE IF EXISTS `hf_data_master_draft`;
CREATE TABLE `hf_data_master_draft` (
  `pk_id` int(11) NOT NULL AUTO_INCREMENT,
  `opening_balance` int(11) DEFAULT NULL,
  `received_balance` int(11) DEFAULT NULL,
  `issue_balance` int(11) DEFAULT NULL,
  `closing_balance` int(11) DEFAULT NULL,
  `wastages` int(11) DEFAULT NULL,
  `vials_used` int(11) DEFAULT NULL,
  `adjustments` int(11) DEFAULT NULL,
  `reporting_start_date` datetime DEFAULT NULL,
  `nearest_expiry` datetime DEFAULT NULL,
  `item_pack_size_id` int(11) DEFAULT NULL,
  `warehouse_id` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `children_live_birth` int(11) DEFAULT NULL,
  `surviving_children_0_11` int(11) DEFAULT NULL,
  `children_aged_12_23` int(11) DEFAULT NULL,
  `pregnant_women` int(11) DEFAULT NULL,
  `item_amc` int(11) DEFAULT NULL,
  `cbas` int(11) DEFAULT NULL,
  PRIMARY KEY (`pk_id`),
  KEY `warehouse_id` (`warehouse_id`),
  KEY `warehouses_data_ibfk_1` (`item_pack_size_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3283470 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for item_categories
-- ----------------------------
DROP TABLE IF EXISTS `item_categories`;
CREATE TABLE `item_categories` (
  `pk_id` int(11) NOT NULL AUTO_INCREMENT,
  `item_category_name` varchar(100) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` datetime DEFAULT NULL,
  `modified_by` int(11) NOT NULL,
  `modified_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`pk_id`),
  KEY `item_categories_users_fk1` (`created_by`) USING BTREE,
  KEY `item_categories_users_fk2` (`modified_by`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for item_pack_sizes
-- ----------------------------
DROP TABLE IF EXISTS `item_pack_sizes`;
CREATE TABLE `item_pack_sizes` (
  `pk_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'liters',
  `item_name` varchar(100) DEFAULT NULL,
  `description` text,
  `number_of_doses` int(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `list_rank` int(11) DEFAULT NULL COMMENT 'not implemented in v1',
  `multiplier` int(11) DEFAULT NULL COMMENT 'Person population covered by the product(Vaccine)',
  `wastage_rate_allowed` float DEFAULT NULL,
  `item_category_id` int(11) DEFAULT NULL,
  `item_unit_id` int(11) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `color` varchar(100) DEFAULT NULL,
  `vvm_group_id` int(11) DEFAULT NULL,
  `stakeholder_activity_id` int(11) DEFAULT '1',
  PRIMARY KEY (`pk_id`),
  KEY `item_pack_sizes_item_categories_fk1` (`item_category_id`) USING BTREE,
  KEY `item_pack_sizes_item_units_fk2` (`item_unit_id`) USING BTREE,
  KEY `item_pack_sizes_items_fk3` (`item_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8 COMMENT='contain information about product attributes';

-- ----------------------------
-- Table structure for item_schedule
-- ----------------------------
DROP TABLE IF EXISTS `item_schedule`;
CREATE TABLE `item_schedule` (
  `pk_id` int(11) NOT NULL,
  `item_pack_size_id` int(11) DEFAULT NULL,
  `number_of_doses` int(11) DEFAULT NULL,
  `starting_no` int(11) DEFAULT NULL,
  `stakeholder_activity_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`pk_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for item_units
-- ----------------------------
DROP TABLE IF EXISTS `item_units`;
CREATE TABLE `item_units` (
  `pk_id` int(11) NOT NULL AUTO_INCREMENT,
  `item_unit_name` varchar(100) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` datetime DEFAULT NULL,
  `modified_by` int(11) NOT NULL,
  `modified_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`pk_id`),
  KEY `item_units_users_fk1` (`created_by`) USING BTREE,
  KEY `item_units_users_fk2` (`modified_by`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for items
-- ----------------------------
DROP TABLE IF EXISTS `items`;
CREATE TABLE `items` (
  `pk_id` int(11) NOT NULL AUTO_INCREMENT,
  `description` text,
  `created_by` int(11) NOT NULL,
  `created_date` datetime DEFAULT NULL,
  `modified_by` int(11) NOT NULL,
  `modified_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `pack_volume` float DEFAULT NULL,
  `doses_per_year` int(11) DEFAULT NULL,
  `pack_diluent_volume` float DEFAULT NULL,
  `target_population_factor` int(11) DEFAULT NULL,
  `item_category_id` int(11) DEFAULT NULL,
  `multiplier` int(11) DEFAULT NULL,
  `wastage_rate_allowed` float DEFAULT NULL,
  `population_percent_increase_per_year` float DEFAULT NULL,
  `child_surviving_percent_per_year` float DEFAULT NULL,
  PRIMARY KEY (`pk_id`),
  KEY `items_users_fk1` (`created_by`),
  KEY `items_users_fk2` (`modified_by`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for list_detail
-- ----------------------------
DROP TABLE IF EXISTS `list_detail`;
CREATE TABLE `list_detail` (
  `pk_id` int(11) NOT NULL AUTO_INCREMENT,
  `list_value` varchar(100) DEFAULT NULL,
  `description` text,
  `rank` int(11) DEFAULT NULL,
  `reference_id` int(11) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `list_master_id` int(11) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `modified_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`pk_id`),
  KEY `list_detail_list_master_id_list_master_fk1` (`list_master_id`) USING BTREE,
  KEY `list_detail_created_by_users_fk2` (`created_by`) USING BTREE,
  KEY `list_detail_modified_by_users_fk3` (`modified_by`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=160 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for list_master
-- ----------------------------
DROP TABLE IF EXISTS `list_master`;
CREATE TABLE `list_master` (
  `pk_id` int(11) NOT NULL AUTO_INCREMENT,
  `list_master_name` varchar(100) DEFAULT NULL,
  `description` text,
  `created_by` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_by` int(11) NOT NULL,
  `modified_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `category` enum('IM','CC') DEFAULT NULL,
  PRIMARY KEY (`pk_id`),
  KEY `list_master_created_by_users_fk1` (`created_by`) USING BTREE,
  KEY `list_master_modified_by_users_fk2` (`modified_by`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for location_populations
-- ----------------------------
DROP TABLE IF EXISTS `location_populations`;
CREATE TABLE `location_populations` (
  `pk_id` int(11) NOT NULL AUTO_INCREMENT,
  `population` int(11) DEFAULT NULL,
  `location_id` int(11) DEFAULT NULL,
  `estimation_date` datetime DEFAULT NULL,
  PRIMARY KEY (`pk_id`),
  KEY `location_population_location_id_list_detail_pk_id` (`location_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9684 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for location_types
-- ----------------------------
DROP TABLE IF EXISTS `location_types`;
CREATE TABLE `location_types` (
  `pk_id` int(11) NOT NULL AUTO_INCREMENT,
  `location_type_name` varchar(100) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `geo_level_id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` datetime DEFAULT NULL,
  `modified_by` int(11) NOT NULL,
  `modified_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`pk_id`),
  KEY `location_types_geo_levels_fk1` (`geo_level_id`),
  KEY `location_types_users_fk2` (`created_by`),
  KEY `location_types_users_fk3` (`modified_by`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for locations
-- ----------------------------
DROP TABLE IF EXISTS `locations`;
CREATE TABLE `locations` (
  `pk_id` int(11) NOT NULL AUTO_INCREMENT,
  `location_name` varchar(100) DEFAULT NULL,
  `geo_level_id` int(11) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `location_type_id` int(11) DEFAULT NULL,
  `province_id` int(11) DEFAULT NULL,
  `district_id` int(11) DEFAULT NULL,
  `ccm_location_id` int(11) DEFAULT NULL,
  `sdms_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`pk_id`),
  KEY `geo_level_id` (`geo_level_id`),
  KEY `location_type_id` (`location_type_id`),
  KEY `province_id` (`province_id`),
  KEY `parent_id` (`parent_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5002 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for log_book
-- ----------------------------
DROP TABLE IF EXISTS `log_book`;
CREATE TABLE `log_book` (
  `pk_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `father_name` varchar(255) DEFAULT NULL,
  `gender` enum('Female','Male') DEFAULT NULL,
  `age` varchar(255) DEFAULT NULL,
  `contact` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `district_id` int(11) DEFAULT NULL,
  `union_council_id` int(11) DEFAULT NULL,
  `vaccination_date` datetime DEFAULT NULL,
  `refer_to_warehouse_id` int(255) DEFAULT NULL,
  `remarks` varchar(255) DEFAULT NULL,
  `warehouse_id` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `reporting_start_date` datetime DEFAULT NULL,
  PRIMARY KEY (`pk_id`)
) ENGINE=InnoDB AUTO_INCREMENT=23262 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for log_book_item_doses
-- ----------------------------
DROP TABLE IF EXISTS `log_book_item_doses`;
CREATE TABLE `log_book_item_doses` (
  `pk_id` int(11) NOT NULL AUTO_INCREMENT,
  `item_pack_size_id` int(11) DEFAULT NULL,
  `log_book_id` int(11) DEFAULT NULL,
  `doses` int(255) DEFAULT NULL,
  PRIMARY KEY (`pk_id`)
) ENGINE=InnoDB AUTO_INCREMENT=116336 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for map_district_mapping
-- ----------------------------
DROP TABLE IF EXISTS `map_district_mapping`;
CREATE TABLE `map_district_mapping` (
  `pk_id` int(11) NOT NULL AUTO_INCREMENT,
  `mapping_id` int(11) DEFAULT NULL,
  `district_name` varchar(255) DEFAULT NULL,
  `province_name` varchar(255) DEFAULT NULL,
  `default_district` int(11) DEFAULT NULL,
  `pilot_district_status` tinyint(1) DEFAULT NULL,
  `district_id` int(11) NOT NULL,
  `province_id` int(11) NOT NULL,
  PRIMARY KEY (`pk_id`)
) ENGINE=InnoDB AUTO_INCREMENT=174 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for mos_scale
-- ----------------------------
DROP TABLE IF EXISTS `mos_scale`;
CREATE TABLE `mos_scale` (
  `pk_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary Key',
  `short_term` varchar(5) DEFAULT NULL,
  `long_term` varchar(30) DEFAULT NULL,
  `scale_start` float DEFAULT '0' COMMENT 'Scale start at',
  `scale_end` float DEFAULT '0' COMMENT 'scale ends at',
  `extra` varchar(10) DEFAULT NULL,
  `color_code` varchar(30) DEFAULT NULL,
  `item_id` int(11) NOT NULL,
  `stakeholder_id` int(11) NOT NULL COMMENT 'Foreign Key: Stakeholder',
  `geo_level_id` int(11) NOT NULL COMMENT 'Foreign Key: distribution level',
  PRIMARY KEY (`pk_id`),
  KEY `mos_scale_geo_levels_fk3` (`geo_level_id`),
  KEY `mos_scale_items_fk1` (`item_id`) USING BTREE,
  KEY `mos_scale_stakeholders_fk2` (`stakeholder_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=18524 DEFAULT CHARSET=utf8 COMMENT='contain inforamtion about min/max values of product code etc';

-- ----------------------------
-- Table structure for non_ccm_locations
-- ----------------------------
DROP TABLE IF EXISTS `non_ccm_locations`;
CREATE TABLE `non_ccm_locations` (
  `pk_id` int(11) NOT NULL AUTO_INCREMENT,
  `location_name` varchar(100) DEFAULT NULL,
  `warehouse_id` int(11) NOT NULL,
  `rack_information_id` int(11) DEFAULT NULL,
  `area` int(11) NOT NULL,
  `row` int(11) NOT NULL,
  `rack` int(11) NOT NULL,
  `pallet` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  PRIMARY KEY (`pk_id`),
  KEY `non_ccm_locations_warehouses_fk1` (`warehouse_id`) USING BTREE,
  KEY `non_ccm_locations_rack_information_fk2` (`rack_information_id`) USING BTREE,
  KEY `non_ccm_locations_list_detail_fk3` (`area`) USING BTREE,
  KEY `non_ccm_locations_list_detail_fk4` (`row`) USING BTREE,
  KEY `non_ccm_locations_list_detail_fk5` (`rack`) USING BTREE,
  KEY `non_ccm_locations_list_detail_fk6` (`pallet`) USING BTREE,
  KEY `non_ccm_locations_list_detail_fk7` (`level`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=1622 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for period
-- ----------------------------
DROP TABLE IF EXISTS `period`;
CREATE TABLE `period` (
  `pk_id` int(11) NOT NULL AUTO_INCREMENT,
  `period_name` text,
  `period_code` int(11) NOT NULL COMMENT 'period code',
  `is_month` text,
  `begin_month` int(11) DEFAULT NULL COMMENT 'beginning month of the period',
  `end_month` int(11) DEFAULT NULL COMMENT 'ending month of the period',
  `month_count` int(11) DEFAULT NULL COMMENT 'month count in period',
  PRIMARY KEY (`pk_id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for pilot_districts
-- ----------------------------
DROP TABLE IF EXISTS `pilot_districts`;
CREATE TABLE `pilot_districts` (
  `pk_id` int(11) NOT NULL AUTO_INCREMENT,
  `district_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`pk_id`),
  KEY `pilot_districts_locations_fk1` (`district_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=134 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for pipeline_consignments
-- ----------------------------
DROP TABLE IF EXISTS `pipeline_consignments`;
CREATE TABLE `pipeline_consignments` (
  `pk_id` int(11) NOT NULL AUTO_INCREMENT,
  `voucher_number` varchar(50) DEFAULT NULL,
  `transaction_counter` int(11) DEFAULT NULL,
  `expected_arrival_date` datetime DEFAULT NULL,
  `reference_number` varchar(100) DEFAULT NULL,
  `stakeholder_activity_id` int(11) DEFAULT NULL,
  `description` text,
  `item_pack_size_id` int(11) DEFAULT NULL COMMENT 'manufacture_item_id for history',
  `batch_number` varchar(255) DEFAULT NULL,
  `production_date` datetime DEFAULT NULL,
  `expiry_date` datetime DEFAULT NULL,
  `manufacturer_id` int(11) DEFAULT NULL,
  `vvm_type_id` int(11) DEFAULT NULL,
  `unit_price` float DEFAULT NULL,
  `quantity` int(11) NOT NULL DEFAULT '0',
  `received_quantity` int(11) DEFAULT '0',
  `from_warehouse_id` int(11) NOT NULL,
  `to_warehouse_id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` datetime DEFAULT NULL,
  `master_id` int(11) DEFAULT '0' COMMENT 'This will be use for original stock master id',
  `status` enum('Received','Receiving','Planned') DEFAULT 'Planned',
  `stock_batch_id` int(11) DEFAULT NULL,
  `transaction_type_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`pk_id`),
  KEY `stock_master_transaction_types_fk1` (`unit_price`),
  KEY `stock_master_warehouses_fk2` (`quantity`),
  KEY `stock_master_warehouses_fk3` (`received_quantity`),
  KEY `stock_master_users_fk4` (`created_by`),
  KEY `stock_master_ibfk_1` (`stakeholder_activity_id`)
) ENGINE=InnoDB AUTO_INCREMENT=199 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for pipeline_consignments_draft
-- ----------------------------
DROP TABLE IF EXISTS `pipeline_consignments_draft`;
CREATE TABLE `pipeline_consignments_draft` (
  `pk_id` int(11) NOT NULL AUTO_INCREMENT,
  `expected_arrival_date` datetime DEFAULT NULL,
  `reference_number` varchar(100) DEFAULT NULL,
  `stakeholder_activity_id` int(11) DEFAULT NULL,
  `description` text,
  `item_pack_size_id` int(11) DEFAULT NULL COMMENT 'manufacture_item_id for history',
  `batch_number` varchar(255) DEFAULT NULL,
  `production_date` datetime DEFAULT NULL,
  `expiry_date` datetime DEFAULT NULL,
  `manufacturer_id` int(11) DEFAULT NULL,
  `vvm_type_id` int(11) DEFAULT NULL,
  `unit_price` float DEFAULT NULL,
  `quantity` int(11) NOT NULL DEFAULT '0',
  `from_warehouse_id` int(11) NOT NULL,
  `to_warehouse_id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` datetime DEFAULT NULL,
  `stock_batch_id` int(11) DEFAULT NULL,
  `transaction_type_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`pk_id`),
  KEY `stock_master_transaction_types_fk1` (`unit_price`),
  KEY `stock_master_warehouses_fk2` (`quantity`),
  KEY `stock_master_users_fk4` (`created_by`),
  KEY `stock_master_ibfk_1` (`stakeholder_activity_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for pipeline_consignments_placements
-- ----------------------------
DROP TABLE IF EXISTS `pipeline_consignments_placements`;
CREATE TABLE `pipeline_consignments_placements` (
  `pk_id` int(11) NOT NULL AUTO_INCREMENT,
  `pipeline_consignment_id` int(11) DEFAULT NULL,
  `batch_number` varchar(255) DEFAULT NULL,
  `quantity` decimal(10,0) DEFAULT NULL,
  `placement_location_id` int(11) DEFAULT NULL,
  `vvm_stage` int(11) DEFAULT NULL,
  PRIMARY KEY (`pk_id`),
  KEY `pipeline_consignment_id` (`pipeline_consignment_id`),
  KEY `placement_location_id` (`placement_location_id`)
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for placement_locations
-- ----------------------------
DROP TABLE IF EXISTS `placement_locations`;
CREATE TABLE `placement_locations` (
  `pk_id` int(11) NOT NULL AUTO_INCREMENT,
  `location_type` int(11) DEFAULT NULL,
  `location_barcode` varchar(100) DEFAULT NULL,
  `location_id` int(11) DEFAULT NULL COMMENT 'Its rack locations for ccm and non ccm assets.',
  `capacity_percentage` decimal(10,0) DEFAULT '0',
  PRIMARY KEY (`pk_id`),
  KEY `placement_locations_list_detail_fk1` (`location_type`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=20310 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for placement_summary
-- ----------------------------
DROP TABLE IF EXISTS `placement_summary`;
CREATE TABLE `placement_summary` (
  `pk_id` int(11) NOT NULL AUTO_INCREMENT,
  `item_name` varchar(255) DEFAULT NULL,
  `batch_number` varchar(255) DEFAULT NULL,
  `stock_batch_id` int(11) DEFAULT NULL,
  `placement_location_id` int(11) DEFAULT NULL,
  `vvm_stage` int(11) DEFAULT NULL,
  `quantity` decimal(10,0) DEFAULT NULL,
  `cartons` int(11) DEFAULT NULL,
  PRIMARY KEY (`pk_id`)
) ENGINE=InnoDB AUTO_INCREMENT=53953 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for placements
-- ----------------------------
DROP TABLE IF EXISTS `placements`;
CREATE TABLE `placements` (
  `pk_id` int(11) NOT NULL AUTO_INCREMENT,
  `quantity` int(11) DEFAULT '0',
  `vvm_stage` int(11) DEFAULT '1',
  `is_placed` int(2) unsigned DEFAULT '1' COMMENT '1 when placed 0 when picked',
  `placement_location_id` int(11) DEFAULT NULL COMMENT 'it can be cold chain and non cold chain id',
  `stock_batch_id` int(11) DEFAULT NULL,
  `stock_detail_id` int(11) DEFAULT NULL,
  `placement_transaction_type_id` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  PRIMARY KEY (`pk_id`),
  KEY `placements_stock_batch_fk2` (`stock_batch_id`) USING BTREE,
  KEY `placements_stock_detail_fk3` (`stock_detail_id`) USING BTREE,
  KEY `placements_stock_placement_location_fk1` (`placement_location_id`) USING BTREE,
  KEY `placements_users_fk5` (`created_by`) USING BTREE,
  KEY `placements_list_detail_fk4` (`placement_transaction_type_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=52307 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for purpose_transfer_history
-- ----------------------------
DROP TABLE IF EXISTS `purpose_transfer_history`;
CREATE TABLE `purpose_transfer_history` (
  `pk_id` int(11) NOT NULL AUTO_INCREMENT,
  `from_activity_id` int(11) DEFAULT NULL,
  `to_activity_id` int(11) DEFAULT NULL,
  `from_batch_id` int(11) DEFAULT NULL,
  `to_batch_id` int(11) DEFAULT NULL,
  `quantity` decimal(10,0) DEFAULT NULL,
  `transaction_type_id` int(11) DEFAULT NULL,
  `created_date` date DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`pk_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for rack_information
-- ----------------------------
DROP TABLE IF EXISTS `rack_information`;
CREATE TABLE `rack_information` (
  `pk_id` int(11) NOT NULL AUTO_INCREMENT,
  `rack_type` varchar(50) DEFAULT NULL,
  `no_of_bins` smallint(11) DEFAULT NULL,
  `bin_net_capacity` float DEFAULT NULL,
  `gross_capacity` float DEFAULT NULL,
  `capacity_unit` varchar(50) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` datetime DEFAULT NULL,
  `modified_by` int(11) NOT NULL,
  `modified_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`pk_id`),
  KEY `rack_information_users_fk1` (`created_by`) USING BTREE,
  KEY `rack_information_users_fk2` (`modified_by`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for report_options
-- ----------------------------
DROP TABLE IF EXISTS `report_options`;
CREATE TABLE `report_options` (
  `pk_id` int(11) NOT NULL AUTO_INCREMENT,
  `report_id` varchar(100) DEFAULT NULL,
  `report_title_sql` varchar(1000) DEFAULT NULL,
  `report_data_sql` varchar(1000) DEFAULT NULL,
  `report_stakeholder` int(1) NOT NULL DEFAULT '0' COMMENT 'indicates if config is for specific stakeholder of all stakeholders',
  `report_comparision` int(1) DEFAULT NULL COMMENT 'comparision option id as in select box of graph parameter form',
  `report_data_position` int(1) DEFAULT NULL COMMENT 'position of data returned from stored procedure',
  `report_comparision_flag` int(1) DEFAULT NULL COMMENT 'indicates whether grap is simple or comparison type',
  PRIMARY KEY (`pk_id`)
) ENGINE=InnoDB AUTO_INCREMENT=129 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for reports
-- ----------------------------
DROP TABLE IF EXISTS `reports`;
CREATE TABLE `reports` (
  `report_id` varchar(60) NOT NULL DEFAULT '',
  `report_group` varchar(100) DEFAULT NULL,
  `report_type` decimal(1,0) DEFAULT NULL COMMENT 'graph or report',
  `report_title` varchar(60) DEFAULT NULL,
  `report_xaxis` varchar(60) DEFAULT NULL,
  `report_yaxis` varchar(60) DEFAULT NULL,
  `report_units` varchar(60) DEFAULT NULL,
  `report_factor` decimal(8,0) DEFAULT NULL COMMENT 'factor to scale down y-axix',
  `report_field` varchar(100) DEFAULT NULL,
  `report_description` text,
  `staticpage` varchar(100) DEFAULT NULL,
  `footer_staticpage` varchar(100) DEFAULT NULL,
  `report_order` smallint(6) DEFAULT NULL,
  `report_show_simple` smallint(1) DEFAULT '1',
  `report_show_comp` smallint(1) DEFAULT '1',
  PRIMARY KEY (`report_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for resource_types
-- ----------------------------
DROP TABLE IF EXISTS `resource_types`;
CREATE TABLE `resource_types` (
  `pk_id` int(11) NOT NULL AUTO_INCREMENT,
  `resource_type` varchar(255) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_by` int(11) NOT NULL,
  `modified_date` datetime DEFAULT NULL,
  PRIMARY KEY (`pk_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for resources
-- ----------------------------
DROP TABLE IF EXISTS `resources`;
CREATE TABLE `resources` (
  `pk_id` int(11) NOT NULL AUTO_INCREMENT,
  `resource_name` varchar(100) DEFAULT NULL,
  `description` text,
  `page_title` varchar(255) DEFAULT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` text,
  `rank` int(11) DEFAULT NULL,
  `level` int(11) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `resource_type_id` int(11) NOT NULL,
  `icon_class` varchar(50) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `modified_by` int(11) NOT NULL,
  `modified_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`pk_id`),
  KEY `resource_type_id` (`resource_type_id`),
  KEY `resources_created_by_users_pk` (`created_by`),
  KEY `resources_created_by_users_pk2` (`modified_by`)
) ENGINE=InnoDB AUTO_INCREMENT=840 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for role_resources
-- ----------------------------
DROP TABLE IF EXISTS `role_resources`;
CREATE TABLE `role_resources` (
  `pk_id` int(11) NOT NULL AUTO_INCREMENT,
  `permission` enum('DENY','ALLOW') NOT NULL DEFAULT 'ALLOW',
  `role_id` int(11) NOT NULL,
  `resource_id` int(11) NOT NULL,
  `is_default` int(1) DEFAULT '1',
  PRIMARY KEY (`pk_id`),
  KEY `role_resources_roles_fk1` (`role_id`),
  KEY `role_resources_resources_fk2` (`resource_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12895 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for roles
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `pk_id` int(11) NOT NULL AUTO_INCREMENT,
  `role_name` varchar(100) DEFAULT NULL,
  `description` text,
  `category_id` int(11) NOT NULL COMMENT 'Its role category i-e inventory management, cold chain, campaign etc',
  `status` tinyint(1) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` datetime DEFAULT NULL,
  `modified_by` int(11) NOT NULL,
  `modified_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`pk_id`),
  KEY `roles_users_fk2` (`created_by`) USING BTREE,
  KEY `roles_users_fk3` (`modified_by`) USING BTREE,
  KEY `roles_list_detail_fk1` (`category_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8 COMMENT='contain user type information';

-- ----------------------------
-- Table structure for shipment_detail
-- ----------------------------
DROP TABLE IF EXISTS `shipment_detail`;
CREATE TABLE `shipment_detail` (
  `pk_id` int(11) NOT NULL AUTO_INCREMENT,
  `shipment_id` int(11) DEFAULT NULL,
  `received_date` date DEFAULT NULL,
  `received_quantity` decimal(10,0) DEFAULT NULL,
  `warehouse_id` int(11) DEFAULT NULL,
  `created_date` date DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`pk_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for shipment_history
-- ----------------------------
DROP TABLE IF EXISTS `shipment_history`;
CREATE TABLE `shipment_history` (
  `pk_id` int(11) NOT NULL AUTO_INCREMENT,
  `shipment_id` int(11) DEFAULT NULL,
  `status` enum('Received','Pre Shipment Alert','PO','Tender') DEFAULT NULL,
  `reference_number` varchar(50) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`pk_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for shipments
-- ----------------------------
DROP TABLE IF EXISTS `shipments`;
CREATE TABLE `shipments` (
  `pk_id` int(11) NOT NULL AUTO_INCREMENT,
  `reference_number` varchar(50) DEFAULT NULL,
  `item_pack_size_id` int(11) DEFAULT NULL,
  `shipment_date` date DEFAULT NULL,
  `shipment_quantity` decimal(10,0) DEFAULT NULL,
  `funding_source_id` int(11) DEFAULT NULL,
  `stakeholder_activity_id` int(11) DEFAULT NULL,
  `warehouse_id` int(11) DEFAULT NULL,
  `created_date` date DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`pk_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for stakeholder_activities
-- ----------------------------
DROP TABLE IF EXISTS `stakeholder_activities`;
CREATE TABLE `stakeholder_activities` (
  `pk_id` int(11) NOT NULL AUTO_INCREMENT,
  `activity` varchar(255) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `modified_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`pk_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for stakeholder_item_pack_sizes
-- ----------------------------
DROP TABLE IF EXISTS `stakeholder_item_pack_sizes`;
CREATE TABLE `stakeholder_item_pack_sizes` (
  `pk_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'stakeholder id (primary key)',
  `pack_size_description` text,
  `length` decimal(11,2) DEFAULT NULL,
  `width` decimal(11,2) DEFAULT NULL,
  `height` decimal(11,2) DEFAULT NULL,
  `batch_no_start_position` int(11) DEFAULT NULL,
  `batch_no_end_position` int(11) DEFAULT NULL,
  `expiry_date_start_position` int(11) DEFAULT NULL,
  `expiry_date_end_position` int(11) DEFAULT NULL,
  `gtin_start_position` int(11) DEFAULT NULL,
  `gtin_end_position` int(11) DEFAULT NULL,
  `quantity_per_pack` int(11) unsigned DEFAULT NULL,
  `volume_per_unit_net` decimal(10,2) DEFAULT NULL,
  `pre_printed_barcode` tinyint(1) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `list_rank` int(11) DEFAULT NULL,
  `volum_per_vial` decimal(10,2) DEFAULT NULL,
  `gtin` tinyint(1) DEFAULT NULL,
  `batch` tinyint(1) DEFAULT NULL,
  `expiry` tinyint(1) DEFAULT NULL,
  `item_gtin` varchar(20) DEFAULT NULL,
  `expiry_date_format` int(11) DEFAULT NULL,
  `barcode_type` int(11) DEFAULT NULL,
  `batch_length` int(11) DEFAULT NULL,
  `packaging_level` int(11) DEFAULT '140',
  `stakeholder_id` int(11) DEFAULT NULL,
  `item_pack_size_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`pk_id`),
  KEY `stakeholder_items_stakeholders_fk3` (`stakeholder_id`) USING BTREE,
  KEY `stakeholder_items_item_pack_sizes_fk4` (`item_pack_size_id`) USING BTREE,
  KEY `stakeholder_item_pack_sizes_list_detail_fk2` (`barcode_type`) USING BTREE,
  KEY `stakeholder_item_pack_sizes_list_detail_fk1` (`expiry_date_format`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=819 DEFAULT CHARSET=utf8 COMMENT='contains detail information of stakeholder and itm_info_tab';

-- ----------------------------
-- Table structure for stakeholder_sectors
-- ----------------------------
DROP TABLE IF EXISTS `stakeholder_sectors`;
CREATE TABLE `stakeholder_sectors` (
  `pk_id` int(11) NOT NULL AUTO_INCREMENT,
  `stakeholder_sector_name` varchar(100) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` datetime DEFAULT NULL,
  `modified_by` int(11) NOT NULL,
  `modified_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`pk_id`),
  KEY `stakeholder_sectors_users_fk1` (`created_by`),
  KEY `stakeholder_sectors_users_fk2` (`modified_by`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for stakeholder_types
-- ----------------------------
DROP TABLE IF EXISTS `stakeholder_types`;
CREATE TABLE `stakeholder_types` (
  `pk_id` int(11) NOT NULL AUTO_INCREMENT,
  `stakeholder_type_name` varchar(100) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` datetime DEFAULT NULL,
  `modified_by` int(11) NOT NULL,
  `modified_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`pk_id`),
  KEY `stakeholder_types_users_fk1` (`created_by`),
  KEY `stakeholder_types_users_fk2` (`modified_by`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for stakeholders
-- ----------------------------
DROP TABLE IF EXISTS `stakeholders`;
CREATE TABLE `stakeholders` (
  `pk_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'stakeholder id',
  `stakeholder_name` varchar(100) DEFAULT NULL,
  `list_rank` int(11) DEFAULT NULL COMMENT 'the order in which stakeholder will appear in report or data entry form',
  `parent_id` int(11) NOT NULL,
  `stakeholder_type_id` int(11) NOT NULL DEFAULT '0',
  `stakeholder_sector_id` int(11) NOT NULL,
  `geo_level_id` int(11) NOT NULL,
  `main_stakeholder` int(11) DEFAULT NULL COMMENT 'parent of parent',
  `stakeholder_activity_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`pk_id`),
  KEY `stakeholders_stakeholders_fk1` (`parent_id`),
  KEY `stakeholders_stakeholder_types_fk2` (`stakeholder_type_id`),
  KEY `stakeholders_stakeholder_sectors_fk3` (`stakeholder_sector_id`),
  KEY `stakeholders_geo_levels_fk4` (`geo_level_id`),
  KEY `stakeholders_stakeholders_fk5` (`main_stakeholder`),
  KEY `stakeholders_ibfk_1` (`stakeholder_activity_id`)
) ENGINE=InnoDB AUTO_INCREMENT=91 DEFAULT CHARSET=utf8 COMMENT='contain information about stakeholders';

-- ----------------------------
-- Table structure for stock_batch
-- ----------------------------
DROP TABLE IF EXISTS `stock_batch`;
CREATE TABLE `stock_batch` (
  `pk_id` int(11) NOT NULL AUTO_INCREMENT,
  `number` varchar(100) DEFAULT NULL,
  `batch_master_id` int(11) DEFAULT NULL COMMENT 'system generated id',
  `expiry_date` datetime DEFAULT NULL,
  `quantity` bigint(20) DEFAULT NULL,
  `status` enum('Finished','Stacked','Running') DEFAULT 'Stacked',
  `unit_price` float DEFAULT NULL,
  `production_date` datetime DEFAULT NULL,
  `last_update` datetime DEFAULT NULL,
  `item_pack_size_id` int(11) NOT NULL,
  `vvm_type_id` int(11) DEFAULT NULL,
  `warehouse_id` int(11) NOT NULL,
  `stakeholder_item_pack_size_id` int(11) DEFAULT NULL COMMENT 'manufacture_item_id for history',
  PRIMARY KEY (`pk_id`),
  KEY `item_pack_size_id` (`item_pack_size_id`),
  KEY `vvm_type_id` (`vvm_type_id`),
  KEY `warehouse_id` (`warehouse_id`),
  KEY `batch_master_id` (`batch_master_id`),
  KEY `stakeholder_item_pack_size_id` (`stakeholder_item_pack_size_id`)
) ENGINE=InnoDB AUTO_INCREMENT=63734 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for stock_batch_history
-- ----------------------------
DROP TABLE IF EXISTS `stock_batch_history`;
CREATE TABLE `stock_batch_history` (
  `pk_id` int(11) NOT NULL AUTO_INCREMENT,
  `batch_id` int(11) NOT NULL,
  `number` varchar(100) DEFAULT NULL,
  `batch_master_id` int(11) DEFAULT NULL COMMENT 'system generated id',
  `expiry_date` datetime DEFAULT NULL,
  `quantity` bigint(20) DEFAULT NULL,
  `status` enum('Finished','Stacked','Running') DEFAULT 'Stacked',
  `unit_price` float DEFAULT NULL,
  `production_date` datetime DEFAULT NULL,
  `last_update` datetime DEFAULT NULL,
  `item_pack_size_id` int(11) NOT NULL,
  `vvm_type_id` int(11) DEFAULT NULL,
  `warehouse_id` int(11) NOT NULL,
  `stakeholder_item_pack_size_id` int(11) DEFAULT NULL COMMENT 'manufacture_item_id for history',
  `action_type` tinyint(4) NOT NULL,
  PRIMARY KEY (`pk_id`),
  KEY `item_pack_size_id` (`item_pack_size_id`),
  KEY `vvm_type_id` (`vvm_type_id`),
  KEY `warehouse_id` (`warehouse_id`),
  KEY `batch_master_id` (`batch_master_id`),
  KEY `stakeholder_item_pack_size_id` (`stakeholder_item_pack_size_id`)
) ENGINE=InnoDB AUTO_INCREMENT=44148 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for stock_batch_vvm
-- ----------------------------
DROP TABLE IF EXISTS `stock_batch_vvm`;
CREATE TABLE `stock_batch_vvm` (
  `pk_id` int(11) NOT NULL AUTO_INCREMENT,
  `stock_batch_id` int(11) DEFAULT NULL,
  `vvm_stage` int(11) DEFAULT NULL,
  `quantity` decimal(10,0) DEFAULT NULL,
  PRIMARY KEY (`pk_id`)
) ENGINE=InnoDB AUTO_INCREMENT=405 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for stock_batch_vvm_history
-- ----------------------------
DROP TABLE IF EXISTS `stock_batch_vvm_history`;
CREATE TABLE `stock_batch_vvm_history` (
  `pk_id` int(11) NOT NULL AUTO_INCREMENT,
  `stock_batch_vvm_id` int(11) DEFAULT NULL,
  `stock_batch_id` int(11) DEFAULT NULL,
  `vvm_stage` int(11) DEFAULT NULL,
  `quantity` decimal(10,0) DEFAULT NULL,
  PRIMARY KEY (`pk_id`)
) ENGINE=InnoDB AUTO_INCREMENT=405 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for stock_detail
-- ----------------------------
DROP TABLE IF EXISTS `stock_detail`;
CREATE TABLE `stock_detail` (
  `pk_id` int(11) NOT NULL AUTO_INCREMENT,
  `quantity` bigint(20) DEFAULT NULL,
  `temporary` tinyint(1) DEFAULT NULL,
  `vvm_stage` int(11) DEFAULT NULL,
  `is_received` int(11) DEFAULT NULL,
  `adjustment_type` tinyint(4) DEFAULT NULL,
  `stock_master_id` int(11) NOT NULL,
  `stock_batch_id` int(11) NOT NULL,
  `item_unit_id` int(11) NOT NULL,
  PRIMARY KEY (`pk_id`),
  KEY `stock_detail_stock_master_fk1` (`stock_master_id`),
  KEY `stock_detail_stock_batch_fk2` (`stock_batch_id`),
  KEY `stock_detail_item_units_fk3` (`item_unit_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=279653 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for stock_detail_history
-- ----------------------------
DROP TABLE IF EXISTS `stock_detail_history`;
CREATE TABLE `stock_detail_history` (
  `pk_id` int(11) NOT NULL AUTO_INCREMENT,
  `detail_id` int(11) NOT NULL,
  `quantity` bigint(20) DEFAULT NULL,
  `temporary` tinyint(1) DEFAULT NULL,
  `vvm_stage` int(11) DEFAULT NULL,
  `is_received` int(11) DEFAULT NULL,
  `adjustment_type` tinyint(1) DEFAULT NULL,
  `stock_master_id` int(11) NOT NULL,
  `stock_batch_id` int(11) NOT NULL,
  `item_unit_id` int(11) NOT NULL,
  `action_type` tinyint(4) NOT NULL,
  PRIMARY KEY (`pk_id`),
  KEY `stock_detail_stock_master_fk1` (`stock_master_id`),
  KEY `stock_detail_stock_batch_fk2` (`stock_batch_id`),
  KEY `stock_detail_item_units_fk3` (`item_unit_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=314033 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for stock_master
-- ----------------------------
DROP TABLE IF EXISTS `stock_master`;
CREATE TABLE `stock_master` (
  `pk_id` int(11) NOT NULL AUTO_INCREMENT,
  `transaction_date` datetime DEFAULT NULL,
  `transaction_number` varchar(100) DEFAULT NULL,
  `transaction_counter` int(11) DEFAULT NULL,
  `transaction_reference` varchar(255) DEFAULT NULL,
  `dispatch_by` varchar(255) DEFAULT NULL,
  `draft` tinyint(1) DEFAULT NULL,
  `comments` text,
  `transaction_type_id` int(11) NOT NULL,
  `from_warehouse_id` int(11) NOT NULL,
  `to_warehouse_id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `campaign_id` int(11) DEFAULT NULL,
  `stakeholder_activity_id` int(11) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` datetime DEFAULT NULL,
  `issue_from` date DEFAULT NULL,
  `issue_to` date DEFAULT NULL,
  PRIMARY KEY (`pk_id`),
  KEY `stock_master_transaction_types_fk1` (`transaction_type_id`),
  KEY `stock_master_warehouses_fk2` (`from_warehouse_id`),
  KEY `stock_master_warehouses_fk3` (`to_warehouse_id`),
  KEY `stock_master_users_fk4` (`created_by`),
  KEY `stock_master_ibfk_1` (`stakeholder_activity_id`)
) ENGINE=InnoDB AUTO_INCREMENT=79210 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for stock_master_history
-- ----------------------------
DROP TABLE IF EXISTS `stock_master_history`;
CREATE TABLE `stock_master_history` (
  `pk_id` int(11) NOT NULL AUTO_INCREMENT,
  `master_id` int(11) NOT NULL,
  `transaction_date` datetime DEFAULT NULL,
  `transaction_number` varchar(100) DEFAULT NULL,
  `transaction_counter` int(11) DEFAULT NULL,
  `transaction_reference` varchar(255) DEFAULT NULL,
  `draft` tinyint(1) DEFAULT NULL,
  `comments` text,
  `transaction_type_id` int(11) NOT NULL,
  `from_warehouse_id` int(11) NOT NULL,
  `to_warehouse_id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `campaign_id` int(11) DEFAULT NULL,
  `stakeholder_activity_id` int(11) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` datetime DEFAULT NULL,
  `action_type` tinyint(4) NOT NULL,
  PRIMARY KEY (`pk_id`),
  KEY `stock_master_transaction_types_fk1` (`transaction_type_id`),
  KEY `stock_master_warehouses_fk2` (`from_warehouse_id`),
  KEY `stock_master_warehouses_fk3` (`to_warehouse_id`),
  KEY `stock_master_users_fk4` (`created_by`),
  KEY `stock_master_ibfk_1` (`stakeholder_activity_id`)
) ENGINE=InnoDB AUTO_INCREMENT=77071 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for system
-- ----------------------------
DROP TABLE IF EXISTS `system`;
CREATE TABLE `system` (
  `pk_id` int(11) NOT NULL AUTO_INCREMENT,
  `start_date` datetime DEFAULT NULL COMMENT 'application version',
  `tag_line` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`pk_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='contains system wide global information.';

-- ----------------------------
-- Table structure for tbl_country
-- ----------------------------
DROP TABLE IF EXISTS `tbl_country`;
CREATE TABLE `tbl_country` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `countryName` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=253 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for transaction_types
-- ----------------------------
DROP TABLE IF EXISTS `transaction_types`;
CREATE TABLE `transaction_types` (
  `pk_id` int(11) NOT NULL AUTO_INCREMENT,
  `transaction_type_name` varchar(100) DEFAULT NULL,
  `nature` varchar(1) DEFAULT NULL,
  `is_adjustment` tinyint(1) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` datetime DEFAULT NULL,
  `modified_by` int(11) NOT NULL,
  `modified_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`pk_id`),
  KEY `transaction_types_users_fk1` (`created_by`),
  KEY `transaction_types_users_fk2` (`modified_by`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for user_documents
-- ----------------------------
DROP TABLE IF EXISTS `user_documents`;
CREATE TABLE `user_documents` (
  `pk_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(100) DEFAULT NULL,
  `doc_id` int(11) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `system_ip` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`pk_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for user_login_log
-- ----------------------------
DROP TABLE IF EXISTS `user_login_log`;
CREATE TABLE `user_login_log` (
  `pk_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `ip_address` varchar(15) DEFAULT NULL,
  `login_time` datetime DEFAULT NULL,
  PRIMARY KEY (`pk_id`)
) ENGINE=InnoDB AUTO_INCREMENT=103010 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `pk_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(100) NOT NULL,
  `password` char(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `cell_number` varchar(25) DEFAULT NULL,
  `record_id` varchar(25) DEFAULT NULL,
  `login_id` varchar(150) DEFAULT NULL,
  `designation` varchar(150) DEFAULT NULL,
  `department` varchar(150) DEFAULT NULL,
  `photo` varchar(100) DEFAULT NULL COMMENT 'date when account was opened',
  `address` varchar(200) DEFAULT NULL,
  `phone_number` varchar(25) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `logged_at` datetime DEFAULT NULL,
  `failed_at` datetime DEFAULT NULL,
  `failed_quantity` int(11) DEFAULT '0',
  `role_id` int(11) NOT NULL,
  `stakeholder_id` int(11) NOT NULL,
  `location_id` int(11) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `auth` varchar(50) DEFAULT NULL,
  `organization` varchar(50) DEFAULT NULL,
  `country` int(11) unsigned zerofill DEFAULT NULL,
  PRIMARY KEY (`pk_id`),
  KEY `users_roles_fk1` (`role_id`),
  KEY `users_stakeholders_fk2` (`stakeholder_id`) USING BTREE,
  KEY `users_users_fk4` (`created_by`) USING BTREE,
  KEY `users_locations_fk3` (`location_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=1732 DEFAULT CHARSET=utf8 COMMENT='contain user information';

-- ----------------------------
-- Table structure for vvm_groups
-- ----------------------------
DROP TABLE IF EXISTS `vvm_groups`;
CREATE TABLE `vvm_groups` (
  `pk_id` int(11) NOT NULL AUTO_INCREMENT,
  `vvm_group_id` int(11) DEFAULT NULL,
  `vvm_stage_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`pk_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for vvm_stages
-- ----------------------------
DROP TABLE IF EXISTS `vvm_stages`;
CREATE TABLE `vvm_stages` (
  `pk_id` int(11) NOT NULL AUTO_INCREMENT,
  `vvm_stage_value` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`pk_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for vvm_transfer_history
-- ----------------------------
DROP TABLE IF EXISTS `vvm_transfer_history`;
CREATE TABLE `vvm_transfer_history` (
  `pk_id` int(11) NOT NULL AUTO_INCREMENT,
  `batch_id` int(11) DEFAULT NULL,
  `from_vvm_stage_id` int(11) DEFAULT NULL,
  `to_vvm_stage_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `created_date` date DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`pk_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for vvm_types
-- ----------------------------
DROP TABLE IF EXISTS `vvm_types`;
CREATE TABLE `vvm_types` (
  `pk_id` int(11) NOT NULL AUTO_INCREMENT,
  `vvm_type_name` varchar(255) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `item_pack_size_id` int(11) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` datetime DEFAULT NULL,
  `modified_by` int(11) NOT NULL,
  `modified_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`pk_id`),
  KEY `vvm_types_users_fk1` (`created_by`),
  KEY `vvm_types_users_fk2` (`modified_by`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for warehouse_population
-- ----------------------------
DROP TABLE IF EXISTS `warehouse_population`;
CREATE TABLE `warehouse_population` (
  `pk_id` int(11) NOT NULL AUTO_INCREMENT,
  `facility_total_pouplation` int(11) DEFAULT NULL,
  `live_births_per_year` int(11) DEFAULT NULL,
  `pregnant_women_per_year` int(11) DEFAULT NULL,
  `women_of_child_bearing_age` int(11) DEFAULT NULL,
  `estimation_year` datetime DEFAULT NULL,
  `warehouse_id` int(11) DEFAULT NULL,
  `requirments_4degree` double(11,2) DEFAULT NULL,
  `requirments_20degree` double(11,2) DEFAULT NULL,
  `capacity_4degree` double(11,2) DEFAULT NULL,
  `capacity_20degree` double(11,2) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` datetime DEFAULT NULL,
  `modified_by` int(11) NOT NULL,
  `modified_date` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`pk_id`),
  KEY `warehouses_population_warehouses_fk1` (`warehouse_id`) USING BTREE,
  KEY `warehouses_population_users_fk2` (`created_by`) USING BTREE,
  KEY `warehouses_population_users_fk3` (`modified_by`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=5574 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for warehouse_population_archieve
-- ----------------------------
DROP TABLE IF EXISTS `warehouse_population_archieve`;
CREATE TABLE `warehouse_population_archieve` (
  `pk_id` int(11) NOT NULL AUTO_INCREMENT,
  `facility_total_pouplation` int(255) DEFAULT NULL,
  `live_births_per_year` int(255) DEFAULT NULL,
  `pregnant_women_per_year` int(255) DEFAULT NULL,
  `women_of_child_bearing_age` int(255) DEFAULT NULL,
  `estimation_year` datetime DEFAULT NULL,
  `warehouse_id` int(11) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` datetime DEFAULT NULL,
  `modified_by` int(11) NOT NULL,
  `modified_date` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`pk_id`),
  KEY `warehouses_population_archieve_users_fk2` (`created_by`) USING BTREE,
  KEY `warehouses_population_archieve_users_fk3` (`modified_by`) USING BTREE,
  KEY `warehouses_population_archieve_warehouses_fk1` (`warehouse_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for warehouse_storage_types
-- ----------------------------
DROP TABLE IF EXISTS `warehouse_storage_types`;
CREATE TABLE `warehouse_storage_types` (
  `pk_id` int(11) NOT NULL AUTO_INCREMENT,
  `storage_temperature` int(11) DEFAULT NULL,
  `stakeholder_item_pack_size_id` int(11) DEFAULT NULL,
  `warehouse_type_id` int(11) DEFAULT NULL,
  `stakeholder_activity_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`pk_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for warehouse_type_categories
-- ----------------------------
DROP TABLE IF EXISTS `warehouse_type_categories`;
CREATE TABLE `warehouse_type_categories` (
  `pk_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`pk_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for warehouse_types
-- ----------------------------
DROP TABLE IF EXISTS `warehouse_types`;
CREATE TABLE `warehouse_types` (
  `pk_id` int(11) NOT NULL,
  `warehouse_type_name` varchar(100) DEFAULT NULL,
  `resupply_interval` int(11) DEFAULT NULL,
  `reserved_stock` int(11) DEFAULT NULL,
  `usage_percentage` decimal(2,0) DEFAULT NULL,
  `geo_level_id` int(11) DEFAULT NULL,
  `warehouse_type_category_id` int(11) DEFAULT NULL,
  `list_rank` int(11) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` datetime DEFAULT NULL,
  `modified_by` int(11) NOT NULL,
  `modified_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`pk_id`),
  KEY `warehouse_types_users_fk1` (`created_by`) USING BTREE,
  KEY `warehouse_types_users_fk2` (`modified_by`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for warehouse_users
-- ----------------------------
DROP TABLE IF EXISTS `warehouse_users`;
CREATE TABLE `warehouse_users` (
  `pk_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `warehouse_id` int(11) NOT NULL,
  `is_default` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`pk_id`),
  KEY `warehouse_users_users_fk1` (`user_id`),
  KEY `warehouse_id` (`warehouse_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=17962 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for warehouses
-- ----------------------------
DROP TABLE IF EXISTS `warehouses`;
CREATE TABLE `warehouses` (
  `pk_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `warehouse_name` varchar(255) DEFAULT NULL,
  `population` double(255,0) DEFAULT NULL,
  `district_id` int(11) DEFAULT NULL,
  `province_id` int(11) DEFAULT NULL COMMENT 'province of warehouse',
  `stakeholder_id` int(11) DEFAULT NULL COMMENT 'stakeholder',
  `location_id` int(11) DEFAULT NULL,
  `stakeholder_office_id` int(11) DEFAULT NULL,
  `warehouse_type_id` int(11) DEFAULT NULL,
  `ccem_id` varchar(50) DEFAULT NULL,
  `starting_on` datetime DEFAULT NULL,
  `from_edit` datetime DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1',
  `is_placement_enable` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`pk_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10355 DEFAULT CHARSET=utf8 COMMENT='contain information about warehouse';

-- ----------------------------
-- Table structure for warehouses_data
-- ----------------------------
DROP TABLE IF EXISTS `warehouses_data`;
CREATE TABLE `warehouses_data` (
  `pk_id` int(11) NOT NULL AUTO_INCREMENT,
  `opening_balance` int(11) DEFAULT NULL,
  `received_balance` int(11) DEFAULT NULL,
  `issue_balance` int(11) DEFAULT NULL,
  `closing_balance` int(11) DEFAULT NULL,
  `wastages` int(11) DEFAULT NULL,
  `vials_used` int(11) DEFAULT NULL,
  `adjustments` int(11) DEFAULT NULL,
  `reporting_start_date` datetime DEFAULT NULL,
  `nearest_expiry` datetime DEFAULT NULL,
  `item_pack_size_id` int(11) DEFAULT NULL,
  `warehouse_id` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `is_calculated` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`pk_id`),
  KEY `warehouse_id` (`warehouse_id`),
  KEY `warehouses_data_ibfk_1` (`item_pack_size_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4065248 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for warehouses_data_draft
-- ----------------------------
DROP TABLE IF EXISTS `warehouses_data_draft`;
CREATE TABLE `warehouses_data_draft` (
  `pk_id` int(11) NOT NULL AUTO_INCREMENT,
  `opening_balance` int(11) DEFAULT NULL,
  `received_balance` int(11) DEFAULT NULL,
  `issue_balance` int(11) DEFAULT NULL,
  `closing_balance` int(11) DEFAULT NULL,
  `wastages` int(11) DEFAULT NULL,
  `vials_used` int(11) DEFAULT NULL,
  `adjustments` int(11) DEFAULT NULL,
  `reporting_start_date` datetime DEFAULT NULL,
  `nearest_expiry` datetime DEFAULT NULL,
  `item_pack_size_id` int(11) DEFAULT NULL,
  `warehouse_id` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`pk_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7183471 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for warehouses_service_types
-- ----------------------------
DROP TABLE IF EXISTS `warehouses_service_types`;
CREATE TABLE `warehouses_service_types` (
  `pk_id` int(11) NOT NULL AUTO_INCREMENT,
  `warehouse_id` int(11) DEFAULT NULL,
  `service_type_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`pk_id`),
  KEY `warehouses_list_detail_pk_id_fk3` (`service_type_id`) USING BTREE,
  KEY `warehouses_warehouses_fk1` (`warehouse_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4217 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for warehouses_update_history
-- ----------------------------
DROP TABLE IF EXISTS `warehouses_update_history`;
CREATE TABLE `warehouses_update_history` (
  `pk_id` int(11) NOT NULL AUTO_INCREMENT,
  `report_date` tinyblob,
  `modified_date` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `ip_address` varchar(20) DEFAULT NULL,
  `warehouse_id` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`pk_id`),
  KEY `warehouses_update_history_warehouses_fk1` (`warehouse_id`) USING BTREE,
  KEY `warehouses_update_history_users_fk2` (`modified_by`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=77251 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Procedure structure for PlacementSummary
-- ----------------------------
DROP PROCEDURE IF EXISTS `PlacementSummary`;
DELIMITER ;;
CREATE DEFINER=`vlmis`@`%` PROCEDURE `PlacementSummary`(locationid INT, batchid INT)
    READS SQL DATA
    DETERMINISTIC
BEGIN

DELETE FROM placement_summary WHERE placement_location_id = locationid AND stock_batch_id = batchid;

INSERT INTO placement_summary (
	placement_summary.item_name,
	placement_summary.batch_number,
	placement_summary.stock_batch_id,
	placement_summary.placement_location_id,
	placement_summary.vvm_stage,
	placement_summary.quantity,
	placement_summary.cartons
) SELECT
	item_pack_sizes.item_name,
	stock_batch.number,
	placements.stock_batch_id,
	placements.placement_location_id,
	placements.vvm_stage,
	Sum(placements.quantity) AS qty,
	ROUND(Sum(placements.quantity) / stakeholder_item_pack_sizes.quantity_per_pack) as cartons
FROM
	placements
INNER JOIN stock_batch ON placements.stock_batch_id = stock_batch.pk_id
INNER JOIN stakeholder_item_pack_sizes ON stock_batch.stakeholder_item_pack_size_id = stakeholder_item_pack_sizes.pk_id
INNER JOIN item_pack_sizes ON stock_batch.item_pack_size_id = item_pack_sizes.pk_id
WHERE
	placements.placement_location_id = locationid
AND placements.stock_batch_id = batchid
AND stakeholder_item_pack_sizes.packaging_level = 140
GROUP BY
	placements.vvm_stage,
	placements.stock_batch_id,
	placements.placement_location_id
HAVING
	qty > 0;

END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for REPAdjustQty
-- ----------------------------
DROP PROCEDURE IF EXISTS `REPAdjustQty`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `REPAdjustQty`(batchId INT)
    READS SQL DATA
    DETERMINISTIC
BEGIN

DECLARE	wh_id INT;
DECLARE temp DOUBLE;

SELECT
	warehouse_id INTO wh_id
FROM
	stock_batch
WHERE
	stock_batch.pk_id = batchId LIMIT 1;

SET temp = AdjustQty(batchId,wh_id);

END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for REPgetAMC
-- ----------------------------
DROP PROCEDURE IF EXISTS `REPgetAMC`;
DELIMITER ;;
CREATE DEFINER=`vlmis`@`%` PROCEDURE `REPgetAMC`(in_type char(2), in_rpt_date DATE, in_location_id INT, in_item INT, in_stakeholder INT)
BEGIN

SET @num := 0;
SET @loc := 0;

CASE
WHEN (in_type = 'P') THEN

	SELECT
		AVG(b.csum) AS AMC,
		b.district_id as location_id,
		b.location_name
	FROM
		(
			SELECT
				A.Reporting_start_date,
				A.csum,
				A.district_id,
				A.location_name,
				@num :=
			IF (@loc = district_id, @num + 1, 1) AS row_number,
			@loc := district_id as location_id
		FROM
			(
				SELECT
					Reporting_start_date,
					SUM(warehouses_data.issue_balance) AS csum,
					warehouses.district_id,
					locations.location_name
				FROM
					warehouses
				INNER JOIN warehouses_data ON warehouses.pk_id = warehouses_data.warehouse_id
				INNER JOIN stakeholders ON warehouses.stakeholder_office_id = stakeholders.pk_id
				INNER JOIN locations ON locations.pk_id = warehouses.district_id
        INNER JOIN pilot_districts ON warehouses.district_id = pilot_districts.district_id
				WHERE
					stakeholders.geo_level_id = 6
				AND warehouses_data.issue_balance > 0
				AND warehouses.stakeholder_id = 1
				AND issue_balance > 0
				AND Reporting_start_date <= in_rpt_date
				AND warehouses_data.item_pack_size_id = in_item
				AND warehouses.province_id = in_location_id
				GROUP BY
					warehouses.district_id,
					Reporting_start_date
				ORDER BY
					warehouses.district_id,
					Reporting_start_date DESC
			) AS A
		) AS b
	WHERE
		row_number <= 3
	GROUP BY
		district_id;

WHEN (in_type = 'D') THEN

	SELECT
		AVG(b.csum) AS AMC,
		b.location_id,
		b.location_name
	FROM
		(
			SELECT
				A.Reporting_start_date,
				A.csum,
				A.location_id,
				A.location_name,
				@num :=
			IF (@loc = location_id, @num + 1, 1) AS row_number,
			@loc := location_id
		FROM
			(
				SELECT
					Reporting_start_date,
					SUM(warehouses_data.issue_balance) AS csum,
					warehouses.location_id,
					locations.location_name
				FROM
					warehouses
				INNER JOIN warehouses_data ON warehouses.pk_id = warehouses_data.warehouse_id
				INNER JOIN stakeholders ON warehouses.stakeholder_office_id = stakeholders.pk_id
				INNER JOIN locations ON locations.pk_id = warehouses.location_id
        INNER JOIN pilot_districts ON warehouses.district_id = pilot_districts.district_id 
				WHERE
					stakeholders.geo_level_id >= 6
				AND warehouses_data.issue_balance > 0
				AND warehouses.stakeholder_id = 1
				AND issue_balance > 0
				AND Reporting_start_date <= in_rpt_date
				AND warehouses_data.item_pack_size_id = in_item
				AND warehouses.district_id = in_location_id
				GROUP BY
					warehouses.location_id,
					Reporting_start_date
				ORDER BY
					warehouses.location_id,
					Reporting_start_date DESC
			) AS A
		) AS b
	WHERE
		row_number <= 3
	GROUP BY
		location_id;

END CASE;

END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for REPgetAMCHF
-- ----------------------------
DROP PROCEDURE IF EXISTS `REPgetAMCHF`;
DELIMITER ;;
CREATE DEFINER=`vlmis`@`%` PROCEDURE `REPgetAMCHF`(in_type char(2), in_rpt_date DATE, in_location_id INT, in_item INT, in_stakeholder INT)
BEGIN

SET @num := 0;
SET @loc := 0;

CASE
WHEN (in_type = 'P') THEN

	SELECT
		AVG(b.csum) AS AMC,
		b.district_id as location_id,
		b.location_name
	FROM
		(
			SELECT
				A.Reporting_start_date,
				A.csum,
				A.district_id,
				A.location_name,
				@num :=
			IF (@loc = district_id, @num + 1, 1) AS row_number,
			@loc := district_id as location_id
		FROM
			(
				SELECT
					Reporting_start_date,
					SUM(hf_data_master.issue_balance) AS csum,
					warehouses.district_id,
					locations.location_name
				FROM
					warehouses
				INNER JOIN hf_data_master ON warehouses.pk_id = hf_data_master.warehouse_id
				INNER JOIN stakeholders ON warehouses.stakeholder_office_id = stakeholders.pk_id
				INNER JOIN locations ON locations.pk_id = warehouses.district_id
        INNER JOIN pilot_districts ON warehouses.district_id = pilot_districts.district_id
				WHERE
					stakeholders.geo_level_id = 6
				AND hf_data_master.issue_balance > 0
				AND warehouses.stakeholder_id = 1
				AND issue_balance > 0
				AND Reporting_start_date <= in_rpt_date
				AND hf_data_master.item_pack_size_id = in_item
				AND warehouses.province_id = in_location_id
				GROUP BY
					warehouses.district_id,
					Reporting_start_date
				ORDER BY
					warehouses.district_id,
					Reporting_start_date DESC
			) AS A
		) AS b
	WHERE
		row_number <= 3
	GROUP BY
		district_id;

WHEN (in_type = 'D') THEN

	SELECT
		AVG(b.csum) AS AMC,
		b.location_id,
		b.location_name
	FROM
		(
			SELECT
				A.Reporting_start_date,
				A.csum,
				A.location_id,
				A.location_name,
				@num :=
			IF (@loc = location_id, @num + 1, 1) AS row_number,
			@loc := location_id
		FROM
			(
				SELECT
					Reporting_start_date,
					SUM(hf_data_master.issue_balance) AS csum,
					warehouses.location_id,
					locations.location_name
				FROM
					warehouses
				INNER JOIN hf_data_master ON warehouses.pk_id = hf_data_master.warehouse_id
				INNER JOIN stakeholders ON warehouses.stakeholder_office_id = stakeholders.pk_id
				INNER JOIN locations ON locations.pk_id = warehouses.location_id
        INNER JOIN pilot_districts ON warehouses.district_id = pilot_districts.district_id  
				WHERE
					stakeholders.geo_level_id = 6
				AND hf_data_master.issue_balance > 0
				AND warehouses.stakeholder_id = 1
				AND issue_balance > 0
				AND Reporting_start_date <= in_rpt_date
				AND hf_data_master.item_pack_size_id = in_item
				AND warehouses.district_id = in_location_id
				GROUP BY
					warehouses.location_id,
					Reporting_start_date
				ORDER BY
					warehouses.location_id,
					Reporting_start_date DESC
			) AS A
		) AS b
	WHERE
		row_number <= 3
	GROUP BY
		location_id;

END CASE;

END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for REPgetCB
-- ----------------------------
DROP PROCEDURE IF EXISTS `REPgetCB`;
DELIMITER ;;
CREATE DEFINER=`vlmis`@`%` PROCEDURE `REPgetCB`(in_type char(2), in_rpt_date DATE, in_location_id INT, in_item INT, in_stakeholder INT)
BEGIN

CASE
WHEN (in_type = 'P') THEN

	SELECT
		Reporting_start_date,
		SUM(warehouses_data.closing_balance) AS CB,
		warehouses.district_id as location_id,
		locations.location_name
	FROM
		warehouses
	INNER JOIN warehouses_data ON warehouses.pk_id = warehouses_data.warehouse_id
	INNER JOIN stakeholders ON warehouses.stakeholder_office_id = stakeholders.pk_id
  INNER JOIN locations ON locations.pk_id = warehouses.district_id
  INNER JOIN pilot_districts ON warehouses.district_id = pilot_districts.district_id
	WHERE
		stakeholders.geo_level_id >= 4
	AND warehouses.stakeholder_id = in_stakeholder
	AND Reporting_start_date = in_rpt_date
	AND warehouses_data.item_pack_size_id = in_item
	AND warehouses.province_id = in_location_id
	GROUP BY
		warehouses.district_id,
		Reporting_start_date
	ORDER BY
		warehouses.district_id,
		Reporting_start_date DESC;

WHEN (in_type = 'D') THEN

	SELECT
		Reporting_start_date,
		SUM(warehouses_data.closing_balance) AS CB,
		warehouses.location_id,
		locations.location_name
	FROM
		warehouses
	INNER JOIN warehouses_data ON warehouses.pk_id = warehouses_data.warehouse_id
	INNER JOIN stakeholders ON warehouses.stakeholder_office_id = stakeholders.pk_id
INNER JOIN locations ON locations.pk_id = warehouses.location_id
INNER JOIN pilot_districts ON warehouses.district_id = pilot_districts.district_id
	WHERE
		stakeholders.geo_level_id >= 6
	AND warehouses.stakeholder_id = in_stakeholder
	AND Reporting_start_date = in_rpt_date
	AND warehouses_data.item_pack_size_id = in_item
	AND warehouses.district_id = in_location_id
	GROUP BY
		warehouses.location_id,
		Reporting_start_date
	ORDER BY
		warehouses.location_id,
		Reporting_start_date DESC;

END CASE;

END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for REPgetCBHF
-- ----------------------------
DROP PROCEDURE IF EXISTS `REPgetCBHF`;
DELIMITER ;;
CREATE DEFINER=`vlmis`@`%` PROCEDURE `REPgetCBHF`(in_type char(2), in_rpt_date DATE, in_location_id INT, in_item INT, in_stakeholder INT)
BEGIN

CASE
WHEN (in_type = 'P') THEN

	SELECT
		Reporting_start_date,
		SUM(hf_data_master.closing_balance) AS CB,
		warehouses.district_id as location_id,
		locations.location_name
	FROM
		warehouses
	INNER JOIN hf_data_master ON warehouses.pk_id = hf_data_master.warehouse_id
	INNER JOIN stakeholders ON warehouses.stakeholder_office_id = stakeholders.pk_id
INNER JOIN locations ON locations.pk_id = warehouses.district_id
INNER JOIN pilot_districts ON warehouses.district_id = pilot_districts.district_id
	WHERE
		stakeholders.geo_level_id >= 4
	AND warehouses.stakeholder_id = in_stakeholder
	AND Reporting_start_date = in_rpt_date
	AND hf_data_master.item_pack_size_id = in_item
	AND warehouses.province_id = in_location_id
	GROUP BY
		warehouses.district_id,
		Reporting_start_date
	ORDER BY
		warehouses.district_id,
		Reporting_start_date DESC;

WHEN (in_type = 'D') THEN

	SELECT
		Reporting_start_date,
		SUM(hf_data_master.closing_balance) AS CB,
		warehouses.location_id,
		locations.location_name
	FROM
		warehouses
	INNER JOIN hf_data_master ON warehouses.pk_id = hf_data_master.warehouse_id
	INNER JOIN stakeholders ON warehouses.stakeholder_office_id = stakeholders.pk_id
INNER JOIN locations ON locations.pk_id = warehouses.location_id
INNER JOIN pilot_districts ON warehouses.district_id = pilot_districts.district_id
	WHERE
		stakeholders.geo_level_id >= 6
	AND warehouses.stakeholder_id = in_stakeholder
	AND Reporting_start_date = in_rpt_date
	AND hf_data_master.item_pack_size_id = in_item
	AND warehouses.district_id = in_location_id
	GROUP BY
		warehouses.location_id,
		Reporting_start_date
	ORDER BY
		warehouses.location_id,
		Reporting_start_date DESC;

END CASE;

END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for REPgetConsumption
-- ----------------------------
DROP PROCEDURE IF EXISTS `REPgetConsumption`;
DELIMITER ;;
CREATE DEFINER=`vlmis`@`%` PROCEDURE `REPgetConsumption`(in_type char(2), in_rpt_date DATE, in_location_id INT, in_item INT, in_stakeholder INT)
BEGIN

CASE
WHEN (in_type = 'P') THEN

	SELECT
		warehouses_data.reporting_start_date,
		SUM(warehouses_data.issue_balance) AS consumption,
		warehouses.district_id AS location_id,
		locations.location_name,
		ROUND(
			(
				(
					(
						(
							location_populations.population / 100
						) * items.population_percent_increase_per_year
					) / 100 * items.child_surviving_percent_per_year
				) * items.doses_per_year
			) / 12
		) AS target
	FROM
		warehouses
	INNER JOIN warehouses_data ON warehouses.pk_id = warehouses_data.warehouse_id
	INNER JOIN stakeholders ON warehouses.stakeholder_office_id = stakeholders.pk_id
	INNER JOIN locations ON locations.pk_id = warehouses.district_id
  INNER JOIN pilot_districts ON warehouses.district_id = pilot_districts.district_id
	INNER JOIN location_populations ON warehouses.district_id = location_populations.location_id
	INNER JOIN item_pack_sizes ON warehouses_data.item_pack_size_id = item_pack_sizes.pk_id
	INNER JOIN items ON item_pack_sizes.item_id = items.pk_id
	WHERE
		stakeholders.geo_level_id >= 4
	AND warehouses.stakeholder_id = in_stakeholder
	AND warehouses_data.reporting_start_date = in_rpt_date
	AND warehouses_data.item_pack_size_id = in_item
	AND warehouses.province_id = in_location_id
	AND YEAR (location_populations.estimation_date) = YEAR(in_rpt_date)
	GROUP BY
		warehouses.district_id,
		Reporting_start_date
	ORDER BY
		warehouses.district_id,
		Reporting_start_date DESC;

WHEN (in_type = 'D') THEN

	SELECT
		warehouses_data.reporting_start_date,
		SUM(warehouses_data.issue_balance) AS consumption,
		warehouses.location_id AS location_id,
		locations.location_name,
		ROUND(
			(
				(
					(
						(
							location_populations.population / 100
						) * items.population_percent_increase_per_year
					) / 100 * items.child_surviving_percent_per_year
				) * items.doses_per_year
			) / 12
		) AS target
	FROM
		warehouses
	INNER JOIN warehouses_data ON warehouses.pk_id = warehouses_data.warehouse_id
	INNER JOIN stakeholders ON warehouses.stakeholder_office_id = stakeholders.pk_id
	INNER JOIN locations ON locations.pk_id = warehouses.location_id
  INNER JOIN pilot_districts ON warehouses.district_id = pilot_districts.district_id
	INNER JOIN location_populations ON warehouses.location_id = location_populations.location_id
	INNER JOIN item_pack_sizes ON warehouses_data.item_pack_size_id = item_pack_sizes.pk_id
	INNER JOIN items ON item_pack_sizes.item_id = items.pk_id
	WHERE
		stakeholders.geo_level_id = 6
	AND warehouses.stakeholder_id = in_stakeholder
	AND warehouses_data.reporting_start_date = in_rpt_date
	AND warehouses_data.item_pack_size_id = in_item
	AND locations.parent_id = in_location_id
	AND YEAR (location_populations.estimation_date) = YEAR(in_rpt_date)
	GROUP BY
		warehouses.location_id,
		Reporting_start_date
	ORDER BY
		warehouses.location_id,
		Reporting_start_date DESC;

END CASE;

END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for REPgetConsumptionHF
-- ----------------------------
DROP PROCEDURE IF EXISTS `REPgetConsumptionHF`;
DELIMITER ;;
CREATE DEFINER=`vlmis`@`%` PROCEDURE `REPgetConsumptionHF`(in_type char(2), in_rpt_date DATE, in_location_id INT, in_item INT, in_stakeholder INT)
BEGIN

CASE
WHEN (in_type = 'P') THEN

	SELECT
		hf_data_master.reporting_start_date,
		SUM(hf_data_master.issue_balance) AS consumption,
		warehouses.district_id AS location_id,
		locations.location_name,
		ROUND(
			(
				(
					(
						(
							location_populations.population / 100
						) * items.population_percent_increase_per_year
					) / 100 * items.child_surviving_percent_per_year
				) * items.doses_per_year
			) / 12
		) AS target
	FROM
		warehouses
	INNER JOIN hf_data_master ON warehouses.pk_id = hf_data_master.warehouse_id
	INNER JOIN stakeholders ON warehouses.stakeholder_office_id = stakeholders.pk_id
	INNER JOIN locations ON locations.pk_id = warehouses.district_id
  INNER JOIN pilot_districts ON warehouses.district_id = pilot_districts.district_id
	INNER JOIN location_populations ON warehouses.district_id = location_populations.location_id
	INNER JOIN item_pack_sizes ON hf_data_master.item_pack_size_id = item_pack_sizes.pk_id
	INNER JOIN items ON item_pack_sizes.item_id = items.pk_id
	WHERE
		stakeholders.geo_level_id >= 4
	AND warehouses.stakeholder_id = in_stakeholder
	AND hf_data_master.reporting_start_date = in_rpt_date
	AND hf_data_master.item_pack_size_id = in_item
	AND warehouses.province_id = in_location_id
	AND YEAR (location_populations.estimation_date) = YEAR(in_rpt_date)
	GROUP BY
		warehouses.district_id,
		Reporting_start_date
	ORDER BY
		warehouses.district_id,
		Reporting_start_date DESC;

WHEN (in_type = 'D') THEN

	SELECT
		hf_data_master.reporting_start_date,
		SUM(hf_data_master.issue_balance) AS consumption,
		warehouses.location_id AS location_id,
		locations.location_name,
		ROUND(
			(
				(
					(
						(
							location_populations.population / 100
						) * items.population_percent_increase_per_year
					) / 100 * items.child_surviving_percent_per_year
				) * items.doses_per_year
			) / 12
		) AS target
	FROM
		warehouses
	INNER JOIN hf_data_master ON warehouses.pk_id = hf_data_master.warehouse_id
	INNER JOIN stakeholders ON warehouses.stakeholder_office_id = stakeholders.pk_id
	INNER JOIN locations ON locations.pk_id = warehouses.location_id
  INNER JOIN pilot_districts ON warehouses.district_id = pilot_districts.district_id
	INNER JOIN location_populations ON warehouses.location_id = location_populations.location_id
	INNER JOIN item_pack_sizes ON hf_data_master.item_pack_size_id = item_pack_sizes.pk_id
	INNER JOIN items ON item_pack_sizes.item_id = items.pk_id
	WHERE
		stakeholders.geo_level_id = 6
	AND warehouses.stakeholder_id = in_stakeholder
	AND hf_data_master.reporting_start_date = in_rpt_date
	AND hf_data_master.item_pack_size_id = in_item
	AND locations.parent_id = in_location_id
	AND YEAR (location_populations.estimation_date) = YEAR(in_rpt_date)
	GROUP BY
		warehouses.location_id,
		Reporting_start_date
	ORDER BY
		warehouses.location_id,
		Reporting_start_date DESC;

END CASE;

END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for REPStockBatchHistory
-- ----------------------------
DROP PROCEDURE IF EXISTS `REPStockBatchHistory`;
DELIMITER ;;
CREATE DEFINER=`vlmis`@`%` PROCEDURE `REPStockBatchHistory`(in_id INT, in_action INT)
    READS SQL DATA
    DETERMINISTIC
BEGIN

INSERT INTO stock_batch_history (
	stock_batch_history.batch_id,
	stock_batch_history.number,
	stock_batch_history.batch_master_id,
	stock_batch_history.expiry_date,
	stock_batch_history.quantity,
	stock_batch_history.`status`,
	stock_batch_history.unit_price,
	stock_batch_history.production_date,
	stock_batch_history.last_update,
	stock_batch_history.item_pack_size_id,
	stock_batch_history.vvm_type_id,
	stock_batch_history.warehouse_id,
	stock_batch_history.stakeholder_item_pack_size_id,
	stock_batch_history.action_type
) SELECT
	stock_batch.pk_id,
	stock_batch.number,
	stock_batch.batch_master_id,
	stock_batch.expiry_date,
	stock_batch.quantity,
	stock_batch.`status`,
	stock_batch.unit_price,
	stock_batch.production_date,
	stock_batch.last_update,
	stock_batch.item_pack_size_id,
	stock_batch.vvm_type_id,
	stock_batch.warehouse_id,
	stock_batch.stakeholder_item_pack_size_id,
	in_action
FROM
	stock_batch
WHERE
	stock_batch.pk_id = in_id;

END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for REPStockDetailHistory
-- ----------------------------
DROP PROCEDURE IF EXISTS `REPStockDetailHistory`;
DELIMITER ;;
CREATE DEFINER=`vlmis`@`%` PROCEDURE `REPStockDetailHistory`(in_id INT, in_action INT)
    READS SQL DATA
    DETERMINISTIC
BEGIN

	INSERT INTO stock_detail_history (
		stock_detail_history.detail_id,
		stock_detail_history.quantity,
		stock_detail_history.`temporary`,
		stock_detail_history.vvm_stage,
		stock_detail_history.is_received,
		stock_detail_history.adjustment_type,
		stock_detail_history.stock_master_id,
		stock_detail_history.stock_batch_id,
		stock_detail_history.item_unit_id,
		stock_detail_history.action_type
	) SELECT
		stock_detail.pk_id,
		stock_detail.quantity,
		stock_detail.`temporary`,
		stock_detail.vvm_stage,
		stock_detail.is_received,
		stock_detail.adjustment_type,
		stock_detail.stock_master_id,
		stock_detail.stock_batch_id,
		stock_detail.item_unit_id,
		in_action
	FROM
		stock_detail
	WHERE
		stock_detail.pk_id = in_id;

END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for REPStockMasterHistory
-- ----------------------------
DROP PROCEDURE IF EXISTS `REPStockMasterHistory`;
DELIMITER ;;
CREATE DEFINER=`vlmis`@`%` PROCEDURE `REPStockMasterHistory`(in_id INT, in_action INT)
    READS SQL DATA
    DETERMINISTIC
BEGIN

	INSERT INTO stock_master_history (
		stock_master_history.master_id,
		stock_master_history.transaction_date,
		stock_master_history.transaction_number,
		stock_master_history.transaction_counter,
		stock_master_history.transaction_reference,
		stock_master_history.draft,
		stock_master_history.comments,
		stock_master_history.transaction_type_id,
		stock_master_history.from_warehouse_id,
		stock_master_history.to_warehouse_id,
		stock_master_history.parent_id,
		stock_master_history.campaign_id,
		stock_master_history.stakeholder_activity_id,
		stock_master_history.created_by,
		stock_master_history.created_date,
		stock_master_history.action_type
	) SELECT
		stock_master.pk_id,
		stock_master.transaction_date,
		stock_master.transaction_number,
		stock_master.transaction_counter,
		stock_master.transaction_reference,
		stock_master.draft,
		stock_master.comments,
		stock_master.transaction_type_id,
		stock_master.from_warehouse_id,
		stock_master.to_warehouse_id,
		stock_master.parent_id,
		stock_master.campaign_id,
		stock_master.stakeholder_activity_id,
		stock_master.created_by,
		NOW(),
		in_action
	FROM
		stock_master
	WHERE
		stock_master.pk_id = in_id;

END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for REPUpdateSummaryDistrict
-- ----------------------------
DROP PROCEDURE IF EXISTS `REPUpdateSummaryDistrict`;
DELIMITER ;;
CREATE DEFINER=`vlmis`@`%` PROCEDURE `REPUpdateSummaryDistrict`(in_stk INT, in_item INT, in_rpt_date DATETIME, in_loc INT)
    READS SQL DATA
    DETERMINISTIC
BEGIN

DECLARE locId INTEGER;
DECLARE provId INTEGER;
DECLARE consumption DOUBLE;
DECLARE AMC DOUBLE;
DECLARE SOH DOUBLE;
DECLARE SOHStore DOUBLE;
DECLARE RRPer DOUBLE;
DECLARE totalRecord DOUBLE;
DECLARE totalUCs DOUBLE;
DECLARE wastages DECIMAL(5, 2);
DECLARE pkId INTEGER;
DECLARE in_month INTEGER;
DECLARE in_year INTEGER;

SELECT SUBSTRING(in_rpt_date, 1, 4) INTO in_year;
SELECT SUBSTRING(in_rpt_date, 6, 2) INTO in_month;

#Get District and Province
SELECT
	locations.pk_id,
	locations.province_id
	INTO locId, provId
FROM
	locations
WHERE
	locations.pk_id = in_loc;

#Calculate the Consumption for that Month
SELECT COALESCE(REPgetConsumption(in_month, in_year, in_item, in_stk, 'D', locId), NULL, 0) INTO consumption FROM DUAL;
#Calculate the Average Monthly Consumption for that Month
SELECT COALESCE(REPgetConsumptionAVG('D',  in_month, in_year, in_item, in_stk, locId, locId), NULL, 0) INTO AMC FROM DUAL;
#Calculate Level Closing Balance for that Month 
SELECT COALESCE(REPgetCB('D',  in_month, in_year, in_item, in_stk, locId, locId), NULL, 0) INTO SOH FROM DUAL;
#Calculate Store Closing Balance for that Month 
SELECT COALESCE(REPgetCB('DW',  in_month, in_year, in_item, in_stk, locId, locId), NULL, 0) INTO SOHStore FROM DUAL;

IF (consumption != 0 OR AMC != 0 OR SOH != 0 OR SOHStore != 0) THEN
	# Get wastages Rate
	SELECT COALESCE(REPgetWastage('D',  CONCAT(in_year, '-', LPAD(in_month,2,0), '-01'), CONCAT(in_year, '-', LPAD(in_month,2,0), '-30'), in_stk, in_item, locId, 1), NULL, 0) INTO wastages FROM DUAL;
	# Get Reporting Rate
	SELECT COALESCE(REPgetRR('D',  CONCAT(in_year, '-', LPAD(in_month,2,0), '-01'), CONCAT(in_year, '-', LPAD(in_month,2,0), '-30'), in_stk, in_item, locId, 1), NULL, 0) INTO RRPer FROM DUAL;
	# Get Total UCs
	SELECT REPgetTotalUCs('D', locId, in_stk) INTO totalUCs FROM DUAL;

	#Check if data already present in the Summary Table
	SELECT
		summary_district.pk_id,
		COUNT(summary_district.pk_id)
		INTO pkId, totalRecord
	FROM
		summary_district
	WHERE
		summary_district.district_id = locId
	AND summary_district.item_id = in_item
	AND summary_district.stakeholder_id = in_stk
	AND summary_district.reporting_date = in_rpt_date;

	IF(totalRecord > 0) THEN
		UPDATE summary_district SET
			stakeholder_id = in_stk,
			item_id = in_item,
			district_id = locId,
			province_id = provId,
			reporting_date = in_rpt_date,
			average_consumption = AMC,
			consumption = consumption,
			soh_store = SOHStore,
			soh_level = SOH,
			reporting_rate = RRPer,
			wastages_percentage = wastages,
			total_uc = totalUCs
		WHERE
			pk_id = pkId;
	ELSE
		INSERT INTO summary_district SET
			stakeholder_id = in_stk,
			item_id = in_item,
			district_id = locId,
			province_id = provId,
			reporting_date = in_rpt_date,
			average_consumption = AMC,
			consumption = consumption,
			soh_store = SOHStore,
			soh_level = SOH,
			reporting_rate = RRPer,
			wastages_percentage = wastages,
			total_uc = totalUCs;
	END IF;

END IF;

END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for REPUpdateSummaryNational
-- ----------------------------
DROP PROCEDURE IF EXISTS `REPUpdateSummaryNational`;
DELIMITER ;;
CREATE DEFINER=`vlmis`@`%` PROCEDURE `REPUpdateSummaryNational`(in_stk INT, in_item INT, in_rpt_date DATETIME)
    READS SQL DATA
    DETERMINISTIC
BEGIN

DECLARE locId INTEGER;
DECLARE consumption DOUBLE;
DECLARE AMC DOUBLE;
DECLARE SOH DOUBLE;
DECLARE SOHStore DOUBLE;
DECLARE RRPer DOUBLE;
DECLARE totalRecord DOUBLE;
DECLARE totalUCs DOUBLE;
DECLARE wastages DECIMAL(5, 2);
DECLARE pkId INTEGER;
DECLARE in_month INTEGER;
DECLARE in_year INTEGER;

SELECT SUBSTRING(in_rpt_date, 1, 4) INTO in_year;
SELECT SUBSTRING(in_rpt_date, 6, 2) INTO in_month;

SET locId = 0;

#Calculate the Consumption for that Month
SELECT COALESCE(REPgetConsumption(in_month, in_year, in_item, in_stk, 'N', locId), NULL, 0) INTO consumption FROM DUAL;
#Calculate the Average Monthly Consumption for that Month
SELECT COALESCE(REPgetConsumptionAVG('N',  in_month, in_year, in_item, in_stk, locId, locId), NULL, 0) INTO AMC FROM DUAL;
#Calculate Level Closing Balance for that Month 
SELECT COALESCE(REPgetCB('N',  in_month, in_year, in_item, in_stk, locId, locId), NULL, 0) INTO SOH FROM DUAL;
#Calculate Store Closing Balance for that Month 
SELECT COALESCE(REPgetCB('NW',  in_month, in_year, in_item, in_stk, locId, locId), NULL, 0) INTO SOHStore FROM DUAL;

IF (consumption != 0 OR AMC != 0 OR SOH != 0 OR SOHStore != 0) THEN
	# Get wastages Rate
	SELECT COALESCE(REPgetWastage('N',  CONCAT(in_year, '-', LPAD(in_month,2,0), '-01'), CONCAT(in_year, '-', LPAD(in_month,2,0), '-30'), in_stk, in_item, locId, 1), NULL, 0) INTO wastages FROM DUAL;
	# Get Reporting Rate
	SELECT COALESCE(REPgetRR('N',  CONCAT(in_year, '-', LPAD(in_month,2,0), '-01'), CONCAT(in_year, '-', LPAD(in_month,2,0), '-30'), in_stk, in_item, locId, 1), NULL, 0) INTO RRPer FROM DUAL;
	# Get Total UCs
	SELECT REPgetTotalUCs('N', locId, in_stk) INTO totalUCs FROM DUAL;

	#Check if data already present in the Summary Table
	SELECT
		summary_national.pk_id,
		COUNT(summary_national.pk_id)
		INTO pkId, totalRecord
	FROM
		summary_national
	WHERE
		summary_national.item_id = in_item
	AND summary_national.stakeholder_id = in_stk
	AND summary_national.reporting_date = in_rpt_date;

	IF(totalRecord > 0) THEN
		UPDATE summary_national SET
			stakeholder_id = in_stk,
			item_id = in_item,
			reporting_date = in_rpt_date,
			average_consumption = AMC,
			consumption = consumption,
			soh_store = SOHStore,
			soh_level = SOH,
			reporting_rate = RRPer,
			wastages_percentage = wastages,
			total_uc = totalUCs
		WHERE
			pk_id = pkId;
	ELSE
		INSERT INTO summary_national SET
			stakeholder_id = in_stk,
			item_id = in_item,
			reporting_date = in_rpt_date,
			average_consumption = AMC,
			consumption = consumption,
			soh_store = SOHStore,
			soh_level = SOH,
			reporting_rate = RRPer,
			wastages_percentage = wastages,
			total_uc = totalUCs;
	END IF;

END IF;

END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for REPUpdateSummaryProvince
-- ----------------------------
DROP PROCEDURE IF EXISTS `REPUpdateSummaryProvince`;
DELIMITER ;;
CREATE DEFINER=`vlmis`@`%` PROCEDURE `REPUpdateSummaryProvince`(in_stk INT, in_item INT, in_rpt_date DATETIME, in_loc INT)
    READS SQL DATA
    DETERMINISTIC
BEGIN

DECLARE locId INTEGER;
DECLARE provId INTEGER;
DECLARE consumption DOUBLE;
DECLARE AMC DOUBLE;
DECLARE SOH DOUBLE;
DECLARE SOHStore DOUBLE;
DECLARE RRPer DOUBLE;
DECLARE totalRecord DOUBLE;
DECLARE totalUCs DOUBLE;
DECLARE wastages DECIMAL(5, 2);
DECLARE pkId INTEGER;
DECLARE in_month INTEGER;
DECLARE in_year INTEGER;

SELECT SUBSTRING(in_rpt_date, 1, 4) INTO in_year;
SELECT SUBSTRING(in_rpt_date, 6, 2) INTO in_month;

SET locId = in_loc;

#Calculate the Consumption for that Month
SELECT COALESCE(REPgetConsumption(in_month, in_year, in_item, in_stk, 'P', locId), NULL, 0) INTO consumption FROM DUAL;
#Calculate the Average Monthly Consumption for that Month
SELECT COALESCE(REPgetConsumptionAVG('P',  in_month, in_year, in_item, in_stk, locId, locId), NULL, 0) INTO AMC FROM DUAL;
#Calculate Level Closing Balance for that Month 
SELECT COALESCE(REPgetCB('P',  in_month, in_year, in_item, in_stk, locId, locId), NULL, 0) INTO SOH FROM DUAL;
#Calculate Store Closing Balance for that Month 
SELECT COALESCE(REPgetCB('PW',  in_month, in_year, in_item, in_stk, locId, locId), NULL, 0) INTO SOHStore FROM DUAL;

IF (consumption != 0 OR AMC != 0 OR SOH != 0 OR SOHStore != 0) THEN
	# Get wastages Rate
	SELECT COALESCE(REPgetWastage('P',  CONCAT(in_year, '-', LPAD(in_month,2,0), '-01'), CONCAT(in_year, '-', LPAD(in_month,2,0), '-30'), in_stk, in_item, locId, 1), NULL, 0) INTO wastages FROM DUAL;
	# Get Reporting Rate
	SELECT COALESCE(REPgetRR('P',  CONCAT(in_year, '-', LPAD(in_month,2,0), '-01'), CONCAT(in_year, '-', LPAD(in_month,2,0), '-30'), in_stk, in_item, locId, 1), NULL, 0) INTO RRPer FROM DUAL;
	# Get Total UCs
	SELECT REPgetTotalUCs('P', locId, in_stk) INTO totalUCs FROM DUAL;

	#Check if data already present in the Summary Table
	SELECT
		summary_provincial.pk_id,
		COUNT(summary_provincial.pk_id)
		INTO pkId, totalRecord
	FROM
		summary_provincial
	WHERE
		summary_provincial.province_id = locId
	AND summary_provincial.item_id = in_item
	AND summary_provincial.stakeholder_id = in_stk
	AND summary_provincial.reporting_date = in_rpt_date;

	IF(totalRecord > 0) THEN
		UPDATE summary_provincial SET
			stakeholder_id = in_stk,
			item_id = in_item,
			province_id = locId,
			reporting_date = in_rpt_date,
			average_consumption = AMC,
			consumption = consumption,
			soh_store = SOHStore,
			soh_level = SOH,
			reporting_rate = RRPer,
			wastages_percentage = wastages,
			total_uc = totalUCs
		WHERE
			pk_id = pkId;
	ELSE
		INSERT INTO summary_provincial SET
			stakeholder_id = in_stk,
			item_id = in_item,
			province_id = locId,
			reporting_date = in_rpt_date,
			average_consumption = AMC,
			consumption = consumption,
			soh_store = SOHStore,
			soh_level = SOH,
			reporting_rate = RRPer,
			wastages_percentage = wastages,
			total_uc = totalUCs;
	END IF;

END IF;

END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for REPUpdateSummaryTehsil
-- ----------------------------
DROP PROCEDURE IF EXISTS `REPUpdateSummaryTehsil`;
DELIMITER ;;
CREATE DEFINER=`vlmis`@`%` PROCEDURE `REPUpdateSummaryTehsil`(in_stk INT, in_item INT, in_rpt_date DATETIME, in_loc INT)
    READS SQL DATA
    DETERMINISTIC
BEGIN

DECLARE distId DOUBLE;
DECLARE locId INTEGER;
DECLARE provId INTEGER;
DECLARE consumption DOUBLE;
DECLARE AMC DOUBLE;
DECLARE SOH DOUBLE;
DECLARE SOHStore DOUBLE;
DECLARE RRPer DOUBLE;
DECLARE totalRecord DOUBLE;
DECLARE totalUCs DOUBLE;
DECLARE wastages DECIMAL(5, 2);
DECLARE pkId INTEGER;
DECLARE in_month INTEGER;
DECLARE in_year INTEGER;

SELECT SUBSTRING(in_rpt_date, 1, 4) INTO in_year;
SELECT SUBSTRING(in_rpt_date, 6, 2) INTO in_month;

#Get District and Province
SELECT
	locations.pk_id,
	locations.district_id,
	locations.province_id
	INTO locId, distId, provId
FROM
	locations
WHERE
	locations.pk_id = in_loc;

#Calculate the Consumption for that Month
SELECT COALESCE(REPgetConsumption(in_month, in_year, in_item, in_stk, 'H', locId), NULL, 0) INTO consumption FROM DUAL;
#Calculate the Average Monthly Consumption for that Month
SELECT COALESCE(REPgetConsumptionAVG('H',  in_month, in_year, in_item, in_stk, locId, locId), NULL, 0) INTO AMC FROM DUAL;
#Calculate Level Closing Balance for that Month 
SELECT COALESCE(REPgetCB('H',  in_month, in_year, in_item, in_stk, locId, locId), NULL, 0) INTO SOH FROM DUAL;
#Calculate Store Closing Balance for that Month 
SELECT COALESCE(REPgetCB('HW',  in_month, in_year, in_item, in_stk, locId, locId), NULL, 0) INTO SOHStore FROM DUAL;

IF (consumption != 0 OR AMC != 0 OR SOH != 0 OR SOHStore != 0) THEN
	# Get wastages Rate
	SELECT COALESCE(REPgetWastage('T',  CONCAT(in_year, '-', LPAD(in_month,2,0), '-01'), CONCAT(in_year, '-', LPAD(in_month,2,0), '-30'), in_stk, in_item, locId, 1), NULL, 0) INTO wastages FROM DUAL;
	# Get Reporting Rate
	SELECT COALESCE(REPgetRR('T',  CONCAT(in_year, '-', LPAD(in_month,2,0), '-01'), CONCAT(in_year, '-', LPAD(in_month,2,0), '-30'), in_stk, in_item, locId, 1), NULL, 0) INTO RRPer FROM DUAL;
	# Get Total UCs
	SELECT REPgetTotalUCs('T', locId, in_stk) INTO totalUCs FROM DUAL;

	#Check if data already present in the Summary Table
	SELECT
		summary_tehsil.pk_id,
		COUNT(summary_tehsil.pk_id)
		INTO pkId, totalRecord
	FROM
		summary_tehsil
	WHERE
		summary_tehsil.tehsil_id = locId
	AND summary_tehsil.item_id = in_item
	AND summary_tehsil.stakeholder_id = in_stk
	AND summary_tehsil.reporting_date = in_rpt_date;

	IF(totalRecord > 0) THEN
		UPDATE summary_tehsil SET
			stakeholder_id = in_stk,
			item_id = in_item,
			district_id = distId,
			province_id = provId,
			tehsil_id = locId,
			reporting_date = in_rpt_date,
			average_consumption = AMC,
			consumption = consumption,
			soh_store = SOHStore,
			soh_level = SOH,
			reporting_rate = RRPer,
			wastages_percentage = wastages,
			total_uc = totalUCs
		WHERE
			pk_id = pkId;
	ELSE
		INSERT INTO summary_tehsil SET
			stakeholder_id = in_stk,
			item_id = in_item,
			district_id = distId,
			province_id = provId,
			tehsil_id = locId,
			reporting_date = in_rpt_date,
			average_consumption = AMC,
			consumption = consumption,
			soh_store = SOHStore,
			soh_level = SOH,
			reporting_rate = RRPer,
			wastages_percentage = wastages,
			total_uc = totalUCs;
	END IF;

END IF;

END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for REPUpdateSummaryUC
-- ----------------------------
DROP PROCEDURE IF EXISTS `REPUpdateSummaryUC`;
DELIMITER ;;
CREATE DEFINER=`vlmis`@`%` PROCEDURE `REPUpdateSummaryUC`(in_wh_id INTEGER, in_item VARCHAR(10), in_rpt_date DATETIME)
    READS SQL DATA
    DETERMINISTIC
BEGIN

DECLARE distId DOUBLE;
DECLARE stkId INTEGER;
DECLARE locId INTEGER;
DECLARE provId INTEGER;
DECLARE tehsilId INTEGER;
DECLARE consumption DOUBLE;
DECLARE AMC DOUBLE;
DECLARE SOH DOUBLE;
DECLARE SOHStore DOUBLE;
DECLARE RRPer DOUBLE;
DECLARE totalRecord DOUBLE;
DECLARE totalUCs DOUBLE;
DECLARE wastages DECIMAL(5, 2);
DECLARE pkId INTEGER;
DECLARE in_month INTEGER;
DECLARE in_year INTEGER;

SELECT SUBSTRING(in_rpt_date, 1, 4) INTO in_year;
SELECT SUBSTRING(in_rpt_date, 6, 2) INTO in_month;

#Get location ID and stakeholder of the warehouse
SELECT
	warehouses.location_id,
	warehouses.district_id,
	warehouses.stakeholder_id,
	warehouses.province_id,
	locations.parent_id
INTO locId, distId, stkId, provId, tehsilId
FROM
	warehouses
INNER JOIN locations ON warehouses.location_id = locations.pk_id
WHERE
	warehouses.pk_id = in_wh_id;

#Calculate the Consumption for that Month
SELECT COALESCE(REPgetConsumption(in_month, in_year, in_item, stkid, 'U', locId), NULL, 0) INTO consumption FROM DUAL;
#Calculate the Average Monthly Consumption for that Month
SELECT COALESCE(REPgetConsumptionAVG('U',  in_month, in_year, in_item, stkId, locId, locId), NULL, 0) INTO AMC FROM DUAL;
#Calculate Level Closing Balance for that Month 
SELECT COALESCE(REPgetCB('U',  in_month, in_year, in_item, stkId, locId, locId), NULL, 0) INTO SOH FROM DUAL;
#Calculate Store Closing Balance for that Month 
SELECT COALESCE(REPgetCB('UW',  in_month, in_year, in_item, stkId, locId, locId), NULL, 0) INTO SOHStore FROM DUAL;

IF (consumption != 0 OR AMC != 0 OR SOH != 0 OR SOHStore != 0) THEN
	# Get wastages Rate
	SELECT COALESCE(REPgetWastage('U',  CONCAT(in_year, '-', LPAD(in_month,2,0), '-01'), CONCAT(in_year, '-', LPAD(in_month,2,0), '-30'), stkId, in_item, locId, 1), NULL, 0) INTO wastages FROM DUAL;
	# Get Reporting Rate
	SELECT COALESCE(REPgetRR('U',  CONCAT(in_year, '-', LPAD(in_month,2,0), '-01'), CONCAT(in_year, '-', LPAD(in_month,2,0), '-30'), stkId, in_item, locId, 1), NULL, 0) INTO RRPer FROM DUAL;
	# Get Total UCs
	SELECT REPgetTotalUCs('U', locId, stkId) INTO totalUCs FROM DUAL;

	#Check if data already present in the Summary Table
	SELECT
		summary_union_council.pk_id,
		COUNT(summary_union_council.pk_id)
		INTO pkId, totalRecord
	FROM
		summary_union_council
	WHERE
		summary_union_council.union_council_id = distId
	AND summary_union_council.item_id = in_item
	AND summary_union_council.stakeholder_id = stkId
	AND summary_union_council.reporting_date = in_rpt_date;

	IF(totalRecord > 0) THEN
		UPDATE summary_union_council SET
			stakeholder_id = stkId,
			item_id = in_item,
			district_id = distId,
			province_id = provId,
			tehsil_id = tehsilId,
			union_council_id = locId,
			reporting_date = in_rpt_date,
			average_consumption = AMC,
			consumption = consumption,
			soh_store = SOHStore,
			soh_level = SOH,
			reporting_rate = RRPer,
			wastages_percentage = wastages,
			total_uc = totalUCs
		WHERE
			pk_id = pkId;
	ELSE
		INSERT INTO summary_union_council SET
			stakeholder_id = stkId,
			item_id = in_item,
			district_id = distId,
			province_id = provId,
			tehsil_id = tehsilId,
			union_council_id = locId,
			reporting_date = in_rpt_date,
			average_consumption = AMC,
			consumption = consumption,
			soh_store = SOHStore,
			soh_level = SOH,
			reporting_rate = RRPer,
			wastages_percentage = wastages,
			total_uc = totalUCs;
	END IF;

END IF;

END
;;
DELIMITER ;

-- ----------------------------
-- Function structure for AdjustQty
-- ----------------------------
DROP FUNCTION IF EXISTS `AdjustQty`;
DELIMITER ;;
CREATE DEFINER=`vlmis`@`%` FUNCTION `AdjustQty`(`batchId` int,`whId` int) RETURNS bigint(20)
    DETERMINISTIC
BEGIN 
  -- DECLARE receive INT;
  -- DECLARE issue INT;
  -- DECLARE adjustment INT;
  DECLARE qty BIGINT;

SELECT
	 IFNULL(Sum(stock_detail.quantity),0) INTO qty
	 FROM
	 stock_detail
	INNER JOIN stock_batch ON  stock_detail.stock_batch_id = stock_batch.pk_id
  INNER JOIN stock_master ON   stock_detail.stock_master_id = stock_master.pk_id
	WHERE
	stock_detail.stock_batch_id = batchId AND
	stock_batch.warehouse_id= whId;
  /*
SELECT
	 IFNULL(Sum(stock_detail.quantity),0) INTO receive
	 FROM
	 stock_detail
	INNER JOIN stock_batch ON  stock_detail.stock_batch_id = stock_batch.pk_id
  INNER JOIN stock_master ON   stock_detail.stock_master_id = stock_master.pk_id
	WHERE
	stock_master.transaction_type_id = 1 AND
	stock_detail.stock_batch_id = batchId AND
	stock_master.to_warehouse_id= whId;

	SELECT
	IFNULL(Sum(stock_detail.quantity),0) INTO issue
	FROM
	stock_detail 
	INNER JOIN  stock_batch  ON  stock_detail.stock_batch_id = stock_batch.pk_id
  INNER JOIN   stock_master  ON   stock_detail.stock_master_id = stock_master.pk_id
	WHERE
	stock_master.transaction_type_id = 2 AND
	stock_detail.stock_batch_id = batchId AND
	stock_master.from_warehouse_id  = whId;

	SELECT
	IFNULL(Sum(stock_detail.quantity),0)  INTO  adjustment
	FROM
	stock_detail
	INNER JOIN  stock_batch  ON  stock_detail.stock_batch_id  = stock_batch.pk_id
  INNER JOIN  stock_master ON  stock_detail.stock_master_id  = stock_master.pk_id
	WHERE
	stock_master.transaction_type_id > 2 AND
	stock_detail.stock_batch_id = batchId AND
	stock_master.from_warehouse_id  = whId;

	SET qty = receive + issue + adjustment;*/

	 IF(qty >= 0) THEN 
		 UPDATE  stock_batch  SET  quantity = qty	WHERE  pk_id=batchId AND warehouse_id = whId;
	 END IF;

   IF(qty < 0) THEN
		 UPDATE  stock_batch  SET  quantity = 0, status='Finished'	WHERE  pk_id=batchId AND warehouse_id = whId;
	 END IF;
 
	 UPDATE stock_batch SET status='Finished'	WHERE quantity <= 0;
   UPDATE stock_batch SET status='Stacked'	WHERE quantity > 0 and status!='Running'	;

  RETURN(qty);
END
;;
DELIMITER ;

-- ----------------------------
-- Function structure for GetIllegalWastageofDistrict
-- ----------------------------
DROP FUNCTION IF EXISTS `GetIllegalWastageofDistrict`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `GetIllegalWastageofDistrict`(item_id integer, reporting_date varchar(10),district_id integer,allowable_wastage_rate integer,stakeholderid integer) RETURNS varchar(255) CHARSET latin1
    READS SQL DATA
    DETERMINISTIC
BEGIN 
   DECLARE wastage_uc DOUBLE;
	 DECLARE total_ucs DOUBLE;
	 DECLARE wastage_rate DOUBLE;
	 DECLARE retstr VARCHAR(255);
  
	SELECT 
sum(COALESCE (wastagePer, NULL, 0)),
count(UCs),
sum(COALESCE (wastagePer, NULL, 0))/count(UCs)*100 into wastage_uc,total_ucs,wastage_rate
FROM
	(
		SELECT
			if(ROUND(
				IFNULL(
					(
						sum(warehouses_data.wastages) / (
							SUM(
								warehouses_data.issue_balance
							) + sum(warehouses_data.wastages)
						)
					) * 100,
					0
				),
				1
			)>allowable_wastage_rate,1,0) AS wastagePer,
			 UC.pk_id as UCs
		FROM
			locations AS UC
		INNER JOIN warehouses ON UC.pk_id = warehouses.location_id
		INNER JOIN warehouses_data ON warehouses.pk_id = warehouses_data.warehouse_id
		WHERE
			UC.geo_level_id = 6
		AND warehouses.stakeholder_id = stakeholderid
		AND warehouses_data.reporting_start_date = reporting_date 
		AND warehouses_data.issue_balance IS NOT NULL
		AND warehouses_data.item_pack_size_id = item_id
		and UC.district_id=district_id  
GROUP BY  UC.pk_id 
UNION
SELECT
			if(ROUND(
				IFNULL(
					(
						sum(hf_data_master.wastages) / (
							SUM(
								hf_data_master.issue_balance
							) + sum(hf_data_master.wastages)
						)
					) * 100,
					0
				),
				1
			)>allowable_wastage_rate,1,0) AS wastagePer,
			 UC.pk_id as UCs
		FROM
			locations AS UC
		INNER JOIN warehouses ON UC.pk_id = warehouses.location_id
		INNER JOIN hf_data_master ON warehouses.pk_id = hf_data_master.warehouse_id
		WHERE
			UC.geo_level_id = 6
		AND warehouses.stakeholder_id = stakeholderid
		AND hf_data_master.reporting_start_date = reporting_date 
		AND hf_data_master.issue_balance IS NOT NULL
		AND hf_data_master.item_pack_size_id = item_id
		and UC.district_id=district_id  
GROUP BY  UC.pk_id 
	) AS A;
			
	 SET retstr = CONCAT(wastage_uc,'|',total_ucs,'|',wastage_rate);

   RETURN(retstr);  
END
;;
DELIMITER ;

-- ----------------------------
-- Function structure for getMonthlyRcvQtyWH
-- ----------------------------
DROP FUNCTION IF EXISTS `getMonthlyRcvQtyWH`;
DELIMITER ;;
CREATE DEFINER=`vlmis`@`%` FUNCTION `getMonthlyRcvQtyWH`(`in_month` int,`in_year` int,`in_item` int,`in_wh` int) RETURNS int(11)
    DETERMINISTIC
BEGIN
	DECLARE retval INTEGER;

SELECT
		IFNULL(SUM(ABS(stock_detail.quantity)),0) INTO retval 
	FROM
		stock_master
	INNER JOIN stock_detail ON stock_detail.stock_master_id = stock_master.pk_id
	INNER JOIN stock_batch ON stock_detail.stock_batch_id = stock_batch.pk_id
	WHERE
		stock_master.to_warehouse_id = in_wh
	AND stock_master.transaction_type_id = 1
	AND stock_master.transaction_date < DATE_ADD(CONCAT(in_year,'-',in_month,'-01'),INTERVAL 1 MONTH);

RETURN (retval);

END
;;
DELIMITER ;

-- ----------------------------
-- Function structure for getMosColor
-- ----------------------------
DROP FUNCTION IF EXISTS `getMosColor`;
DELIMITER ;;
CREATE DEFINER=`vlmis`@`%` FUNCTION `getMosColor`(`in_id` float,`in_itemrec_id` int,`in_stkid` int,`in_lvlid` int) RETURNS varchar(100) CHARSET latin1
    DETERMINISTIC
BEGIN 
   DECLARE vName VARCHAR(100);
  SET vName = "#000000";
   
   -- check if mos  is a number
   IF (in_id  <> 'UNK') THEN
        SELECT mos_scale.color_code
            INTO  vName 
          FROM  mos_scale
         WHERE in_id  BETWEEN  mos_scale.scale_start  and  mos_scale.scale_end
         and mos_scale. item_id  = in_itemrec_id
         and mos_scale. geo_level_id  =  in_lvlid
         and mos_scale.stakeholder_id =  in_stkid
         LIMIT 1; 
  END IF;
   RETURN(vName);  
END
;;
DELIMITER ;

-- ----------------------------
-- Function structure for GetPicked
-- ----------------------------
DROP FUNCTION IF EXISTS `GetPicked`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `GetPicked`(stock_detail_id integer) RETURNS int(11)
    READS SQL DATA
    DETERMINISTIC
BEGIN
   DECLARE PickedQty INTEGER;
  
			SELECT
				IFNULL(SUM(placements.quantity),0) INTO PickedQty
			FROM
				placements
			WHERE
				placements.stock_detail_id = stock_detail_id
			AND placements.placement_transaction_type_id IN (115,116)
			LIMIT 1;

   RETURN(PickedQty);
END
;;
DELIMITER ;

-- ----------------------------
-- Function structure for GetPlaced
-- ----------------------------
DROP FUNCTION IF EXISTS `GetPlaced`;
DELIMITER ;;
CREATE DEFINER=`vlmis`@`%` FUNCTION `GetPlaced`(stock_detail_id integer) RETURNS int(11)
    READS SQL DATA
    DETERMINISTIC
BEGIN
   DECLARE PlacedQty INTEGER;
  
			SELECT
				IFNULL(SUM(placements.quantity),0) INTO PlacedQty
			FROM
				placements
			WHERE
				placements.stock_detail_id = stock_detail_id
			AND placements.placement_transaction_type_id IN (114,116)
			LIMIT 1;

   RETURN(PlacedQty);
END
;;
DELIMITER ;

-- ----------------------------
-- Function structure for getStkItemCount
-- ----------------------------
DROP FUNCTION IF EXISTS `getStkItemCount`;
DELIMITER ;;
CREATE DEFINER=`vlmis`@`%` FUNCTION `getStkItemCount`(`in_id` int) RETURNS int(11)
    DETERMINISTIC
BEGIN
     DECLARE retval  INTEGER;
   IF (in_id = 0) THEN

      SELECT count(*)
            INTO retval
          FROM  item_pack_sizes;

   ELSE

   --  SELECT count(*)
     --       INTO retval
       --   FROM  stakeholder_item_pack_sizes
        -- WHERE  stakeholder_item_pack_sizes.stakeholders_id =in_id;
				SET retval=1;
   END IF;
     RETURN(retval);
END
;;
DELIMITER ;

-- ----------------------------
-- Function structure for GetUnplacedBatches
-- ----------------------------
DROP FUNCTION IF EXISTS `GetUnplacedBatches`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `GetUnplacedBatches`(`item_id` int) RETURNS int(11)
    DETERMINISTIC
BEGIN 
  DECLARE item_id INT;
	DECLARE batch_id INT;

  /*SELECT
	IFNULL(Sum(stock_detail.quantity),0) INTO item_id
	FROM
	stock_detail
	INNER JOIN stock_batch ON  stock_detail.stock_batch_id = stock_batch.pk_id
  INNER JOIN stock_master ON   stock_detail.stock_master_id = stock_master.pk_id
	WHERE
	stock_detail.adjustment_type = 1 AND
	stock_detail.stock_batch_id = batchId AND
	stock_batch.warehouse_id = whId;*/

	SELECT DISTINCT
	stock_batch.pk_id INTO batch_id
	FROM
	stock_batch
	WHERE
	stock_batch.item_pack_size_id = item_id;

  RETURN(batch_id);
END
;;
DELIMITER ;

-- ----------------------------
-- Function structure for GetVacdoses
-- ----------------------------
DROP FUNCTION IF EXISTS `GetVacdoses`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `GetVacdoses`(item_id integer) RETURNS int(11)
    READS SQL DATA
    DETERMINISTIC
BEGIN 
   DECLARE NoOfDoses INTEGER;
  
			SELECT
			IFNULL(pack_sizes.description,0) INTO NoOfDoses
			FROM
			item_pack_sizes
			INNER JOIN pack_sizes ON item_pack_sizes.pack_sizes_id = pack_sizes.pk_id
			WHERE
			item_pack_sizes.pk_id = item_id
			LIMIT 1;

   RETURN(NoOfDoses);  
END
;;
DELIMITER ;

-- ----------------------------
-- Function structure for getWarehouseType
-- ----------------------------
DROP FUNCTION IF EXISTS `getWarehouseType`;
DELIMITER ;;
CREATE DEFINER=`vlmis`@`%` FUNCTION `getWarehouseType`(in_wh INTEGER) RETURNS int(11)
    DETERMINISTIC
BEGIN

	DECLARE warehouseType INTEGER;

	SELECT
		warehouses.warehouse_type_id INTO warehouseType
	FROM
		warehouses
	WHERE
		warehouses.pk_id = in_wh;

return warehouseType;

END
;;
DELIMITER ;

-- ----------------------------
-- Function structure for ReceiveStockAtUC
-- ----------------------------
DROP FUNCTION IF EXISTS `ReceiveStockAtUC`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `ReceiveStockAtUC`(master_id int, trans_no char(50),batch_id int,bnumber char(50),item_pack_size_id int,wh_id int, countr int) RETURNS int(11)
    DETERMINISTIC
BEGIN
 DECLARE new_master_id INTEGER;
 DECLARE new_batch_id INTEGER;
 DECLARE in_month INTEGER;
 DECLARE in_year INTEGER;
 DECLARE in_item INTEGER;
 DECLARE in_wh INTEGER;
 DECLARE in_user INTEGER;
 DECLARE c DOUBLE DEFAULT 0;
 DECLARE batchId INTEGER;
 DECLARE cnt INTEGER;

INSERT INTO stock_master (
 stock_master.transaction_date,
 stock_master.transaction_number,
 stock_master.transaction_counter,
 stock_master.transaction_reference,
 stock_master.draft,
 stock_master.comments,
 stock_master.transaction_type_id,
 stock_master.from_warehouse_id,
 stock_master.to_warehouse_id,
 stock_master.parent_id,
 stock_master.campaign_id,
 stock_master.stakeholder_activity_id,
 stock_master.created_by,
 stock_master.created_date
) SELECT
 stock_master.transaction_date,
 trans_no,
 countr,
 stock_master.transaction_reference,
 0,
 stock_master.comments,
 1,
 stock_master.from_warehouse_id,
 stock_master.to_warehouse_id,
 stock_master.parent_id,
 stock_master.campaign_id,
 stock_master.stakeholder_activity_id,
 stock_master.created_by,
 stock_master.created_date
FROM
 stock_master
WHERE
 stock_master.pk_id = master_id;

SET new_master_id = LAST_INSERT_ID();

SELECT
 stock_batch.pk_id,
 COUNT(stock_batch.pk_id) INTO batchId,cnt
FROM
 stock_batch
WHERE
 stock_batch.number = bnumber
AND stock_batch.item_pack_size_id = item_pack_size_id
AND stock_batch.warehouse_id = wh_id;

IF(cnt=0) THEN
 INSERT INTO stock_batch (
  stock_batch.number,
  stock_batch.expiry_date,
  stock_batch.unit_price,
  stock_batch.production_date,
  stock_batch.last_update,
  stock_batch.item_pack_size_id,
  stock_batch.vvm_type_id,
  stock_batch.warehouse_id,
  stock_batch.stakeholder_item_pack_size_id
 ) SELECT
  stock_batch.number,
  stock_batch.expiry_date,
  stock_batch.unit_price,
  stock_batch.production_date,
  stock_batch.last_update,
  stock_batch.item_pack_size_id,
  stock_batch.vvm_type_id,
  wh_id,
  stock_batch.stakeholder_item_pack_size_id
 FROM
  stock_batch
 WHERE stock_batch.pk_id = batch_id;

 SET new_batch_id = LAST_INSERT_ID();

ELSE

SET new_batch_id = batchId;

END IF;

INSERT INTO stock_detail (
 stock_detail.quantity,
 stock_detail.`temporary`,
 stock_detail.vvm_stage,
 stock_detail.is_received,
 stock_detail.adjustment_type,
 stock_detail.stock_master_id,
 stock_detail.stock_batch_id,
 stock_detail.item_unit_id
) SELECT
 ABS(stock_detail.quantity),
 0,
 stock_detail.vvm_stage,
 1,
 1,
 new_master_id,
 new_batch_id,
 stock_detail.item_unit_id
FROM
 stock_detail
WHERE
 stock_detail.stock_master_id = master_id;

SELECT
MONTH(stock_master.transaction_date),
YEAR(stock_master.transaction_date),
stock_batch.item_pack_size_id,
stock_master.to_warehouse_id,
stock_master.created_by
INTO in_month, in_year, in_item, in_wh, in_user
FROM
stock_master
INNER JOIN stock_detail ON stock_detail.stock_master_id = stock_master.pk_id
INNER JOIN stock_batch ON stock_detail.stock_batch_id = stock_batch.pk_id
WHERE
stock_detail.stock_master_id = new_master_id LIMIT 1;

SELECT REPUpdateData(in_month, in_year, in_item, in_wh, in_user) INTO c from DUAL;
SELECT AdjustQty(new_batch_id,wh_id) INTO c from DUAL;

 RETURN 1;
END
;;
DELIMITER ;

-- ----------------------------
-- Function structure for REPgetAvailabilityRateStr
-- ----------------------------
DROP FUNCTION IF EXISTS `REPgetAvailabilityRateStr`;
DELIMITER ;;
CREATE DEFINER=`vlmis`@`%` FUNCTION `REPgetAvailabilityRateStr`(`in_type` varchar(8),`in_month` int,`in_year` int,`in_item` varchar(8),`in_WF` varchar(1),`in_stk` int,`in_prov` int,`in_dist` varchar(8)) RETURNS varchar(20) CHARSET latin1
    DETERMINISTIC
BEGIN

DECLARE retval DECIMAL(5,2) ;
DECLARE numExptd INTEGER;
DECLARE numReptd INTEGER;
DECLARE retvalstr VARCHAR(5);

 IF (in_WF = 'F') THEN

-- field reporting rate 
     CASE
       WHEN (in_type ='N') THEN

-- National Report

 -- 1. Get total reports expected 
        SELECT count(warehouses.pk_id) * getStkItemCount(0)
            INTO numExptd
          FROM warehouses  INNER JOIN stakeholders ON warehouses.stakeholder_office_id = stakeholders.pk_id
         WHERE stakeholders.geo_level_id =6;

-- 2. Get total reports received

      SELECT count( warehouses_data.warehouse_id)
          INTO numReptd
         FROM warehouses
         Inner Join warehouses_data ON warehouses.pk_id = warehouses_data.warehouse_id
				 INNER JOIN stakeholders ON warehouses.stakeholder_office_id = stakeholders.pk_id
         WHERE warehouses_data.closing_balance > 0  and  MONTH(warehouses_data.reporting_start_date) = in_month AND YEAR(warehouses_data.reporting_start_date) = in_year AND
							stakeholders.geo_level_id =6;

-- Province Report

    WHEN (in_type ='P') THEN
        SELECT count(warehouses.pk_id)* getStkItemCount(in_item)
            INTO numExptd
          FROM warehouses INNER JOIN stakeholders ON warehouses.stakeholder_office_id = stakeholders.pk_id
         WHERE stakeholders.geo_level_id = 6;

				SELECT count( warehouses_data.warehouse_id)
          INTO numReptd
         FROM warehouses
         Inner Join warehouses_data ON warehouses.pk_id = warehouses_data.warehouse_id
				 INNER JOIN stakeholders ON warehouses.stakeholder_office_id = stakeholders.pk_id
         WHERE warehouses_data.closing_balance > 0 and warehouses_data.item_pack_size_id=in_item
         AND MONTH(warehouses_data.reporting_start_date) = in_month 
				 AND YEAR(warehouses_data.reporting_start_date) = in_year 
				 AND stakeholders.geo_level_id = 6;   

  WHEN (in_type ='D') THEN
        SELECT count(warehouses.pk_id)* getStkItemCount(in_item)
            INTO numExptd
          FROM warehouses INNER JOIN stakeholders ON warehouses.stakeholder_office_id = stakeholders.pk_id
         WHERE stakeholders.geo_level_id = 6;

				SELECT count( warehouses_data.warehouse_id)
          INTO numReptd
         FROM warehouses
         Inner Join warehouses_data ON warehouses.pk_id = warehouses_data.warehouse_id
				 INNER JOIN stakeholders ON warehouses.stakeholder_office_id = stakeholders.pk_id
         WHERE warehouses_data.closing_balance > 0 and warehouses_data.item_pack_size_id=in_item 
         AND MONTH(warehouses_data.reporting_start_date) = in_month 
				 AND YEAR(warehouses_data.reporting_start_date) = in_year 
				 AND stakeholders.geo_level_id = 6;   

  END CASE;

 ELSE
-- warehouse reporting rate 
    CASE
        WHEN (in_type ='N') THEN

-- National Report
       --  1. Get total reports expected 
        SELECT count(warehouses.pk_id)* getStkItemCount(0)
            INTO numExptd
          FROM warehouses INNER JOIN stakeholders ON warehouses.stakeholder_office_id = stakeholders.pk_id
         WHERE stakeholders.geo_level_id = 4 ;

-- 2. Get total reports received
      SELECT count( warehouses_data.warehouse_id)
          INTO numReptd
         FROM warehouses
         Inner Join warehouses_data ON warehouses.pk_id = warehouses_data.warehouse_id
				 INNER JOIN stakeholders ON warehouses.stakeholder_office_id = stakeholders.pk_id
         WHERE warehouses_data.closing_balance > 0 and MONTH(warehouses_data.reporting_start_date) = in_month 
					AND YEAR(warehouses_data.reporting_start_date) = in_year 
					AND stakeholders.geo_level_id = 4;

-- Province Report

 WHEN (in_type = 'P') THEN
       SELECT count(warehouses.pk_id)* getStkItemCount(in_item)
            INTO numExptd
          FROM warehouses INNER JOIN stakeholders ON warehouses.stakeholder_office_id = stakeholders.pk_id
         WHERE stakeholders.geo_level_id = 4;
			

				SELECT count( warehouses_data.warehouse_id)
          INTO numReptd
         FROM warehouses
         Inner Join warehouses_data ON warehouses.pk_id = warehouses_data.warehouse_id
				 INNER JOIN stakeholders ON warehouses.stakeholder_office_id = stakeholders.pk_id
         WHERE warehouses_data.closing_balance > 0 and warehouses_data.item_pack_size_id=in_item
					AND MONTH(warehouses_data.reporting_start_date) = in_month 
					AND YEAR(warehouses_data.reporting_start_date) = in_year 
					AND stakeholders.geo_level_id = 4; 

 WHEN (in_type = 'D') THEN
       SELECT count(warehouses.pk_id)* getStkItemCount(in_item)
            INTO numExptd
          FROM warehouses INNER JOIN stakeholders ON warehouses.stakeholder_office_id = stakeholders.pk_id
         WHERE stakeholders.geo_level_id = 4;
			
			SELECT count( warehouses_data.warehouse_id)
          INTO numReptd
         FROM warehouses
         Inner Join warehouses_data ON warehouses.pk_id = warehouses_data.warehouse_id
				 INNER JOIN stakeholders ON warehouses.stakeholder_office_id = stakeholders.pk_id
         WHERE warehouses_data.closing_balance > 0 and warehouses_data.item_pack_size_id=in_item 
					AND MONTH(warehouses_data.reporting_start_date) = in_month 
					AND YEAR(warehouses_data.reporting_start_date) = in_year 
					AND stakeholders.geo_level_id = 4; 

  END CASE;
END IF;

    SET numExptd = IFNULL(numExptd,0);
    SET numReptd = IFNULL(numReptd,0);

		IF (numExptd > 0 and numReptd > 0) THEN
      set retval = numReptd / numExptd * 100;
      SET retvalstr = round(retval);
		else
       SET retvalstr = 'NA';
    end if;

-- SET retvalstr="0";
     /*set retvalstr = CONCAT(in_type,',',in_id,',',in_month,',',in_year,',',in_item,',',in_WF,',',in_stk,',',in_prov);*/
 RETURN(retvalstr);

    END
;;
DELIMITER ;

-- ----------------------------
-- Function structure for REPgetCB
-- ----------------------------
DROP FUNCTION IF EXISTS `REPgetCB`;
DELIMITER ;;
CREATE DEFINER=`vlmis`@`%` FUNCTION `REPgetCB`(`in_type` varchar(8),`in_month` int,`in_year` int,`in_item` varchar(20),`in_stk` int,`in_prov` int,`in_dist` varchar(8)) RETURNS double
    DETERMINISTIC
BEGIN

 
  DECLARE retval DOUBLE DEFAULT 0;

    -- Declare '_val' variables to read in each record from the cursor
 

--	DECLARE wflag  VARCHAR(10);



 --   stakeholders, province, district flags
/*
IF INSTR(in_type,'1') > 0 THEN
 SET wflag = 'CWH';
 SET in_type = REPLACE(in_type,1,'');
END IF;

IF INSTR(in_type,'2') > 0 THEN
 SET wflag = 'PPIU';
 SET in_type = REPLACE(in_type,2,'');
END IF;
*/

   CASE
  WHEN (in_type = 'N') THEN
-- Aggreate warehouse closing balance national
		SELECT sum(closing_balance) INTO retval from (
    SELECT
			sum(warehouses_data.closing_balance) as closing_balance
		FROM
			warehouses
		INNER JOIN  warehouses_data  ON  warehouses.pk_id = warehouses_data.warehouse_id
		INNER JOIN stakeholders ON   warehouses.stakeholder_office_id=  stakeholders.pk_id
		WHERE
			warehouses_data.item_pack_size_id = in_item
		AND    MONTH(warehouses_data.reporting_start_date) = in_month
		AND   YEAR(warehouses_data.reporting_start_date) = in_year
		AND    stakeholders.geo_level_id >= 1
    UNION 
    SELECT
			sum(hf_data_master.closing_balance) as closing_balance
		FROM
			warehouses
		INNER JOIN  hf_data_master  ON  warehouses.pk_id = hf_data_master.warehouse_id
		INNER JOIN stakeholders ON   warehouses.stakeholder_office_id=  stakeholders.pk_id
		WHERE
			hf_data_master.item_pack_size_id = in_item
		AND    MONTH(hf_data_master.reporting_start_date) = in_month
		AND   YEAR(hf_data_master.reporting_start_date) = in_year
		AND    stakeholders.geo_level_id >= 1 ) A;

  WHEN (in_type = 'NW') THEN
-- Aggreate warehouse closing balance national
		SELECT sum(closing_balance) INTO retval from (
     SELECT
			sum(warehouses_data.closing_balance) as closing_balance
		FROM
			warehouses
		INNER JOIN   warehouses_data   ON    warehouses.pk_id  =   warehouses_data.warehouse_id 
		INNER JOIN  stakeholders  ON   warehouses.stakeholder_office_id =   stakeholders.pk_id
		WHERE
			 warehouses_data.item_pack_size_id = in_item
		AND MONTH(warehouses_data.reporting_start_date) = in_month
		AND YEAR(warehouses_data.reporting_start_date) = in_year
		AND   stakeholders.geo_level_id = 1 
    UNION
    	SELECT
			sum(hf_data_master.closing_balance) as closing_balance
		FROM
			warehouses
		INNER JOIN   hf_data_master   ON    warehouses.pk_id  =   hf_data_master.warehouse_id 
		INNER JOIN  stakeholders  ON   warehouses.stakeholder_office_id =   stakeholders.pk_id
		WHERE
			 hf_data_master.item_pack_size_id = in_item
		AND MONTH(hf_data_master.reporting_start_date) = in_month
		AND YEAR(hf_data_master.reporting_start_date) = in_year
		AND   stakeholders.geo_level_id = 1 ) A;


  WHEN (in_type = 'P') THEN
-- Aggreate warehouse closing balance for selected province 
   SELECT sum(closing_balance) INTO retval from (
   SELECT sum(warehouses_data.closing_balance) as closing_balance
   FROM 
			warehouses
   Inner Join  warehouses_data  ON  warehouses.pk_id  =   warehouses_data.warehouse_id 
 	 Inner Join  stakeholders ON  warehouses.stakeholder_office_id =   stakeholders.pk_id
   WHERE 
			 warehouses_data.item_pack_size_id = in_item 
		AND MONTH(warehouses_data.reporting_start_date) = in_month 
		AND YEAR(warehouses_data.reporting_start_date) = in_year
    AND  warehouses.province_id = in_prov 
		AND   stakeholders.geo_level_id>=2
    UNION 
     SELECT sum(hf_data_master.closing_balance) as closing_balance
   FROM 
			warehouses
   Inner Join  hf_data_master  ON  warehouses.pk_id  =   hf_data_master.warehouse_id 
 	 Inner Join  stakeholders ON  warehouses.stakeholder_office_id =   stakeholders.pk_id
   WHERE 
			 hf_data_master.item_pack_size_id = in_item 
		AND MONTH(hf_data_master.reporting_start_date) = in_month 
		AND YEAR(hf_data_master.reporting_start_date) = in_year
    AND  warehouses.province_id = in_prov 
		AND   stakeholders.geo_level_id>=2 ) A  ;

 WHEN (in_type = 'PW') THEN
-- Aggreate warehouse closing balance for selected province 
Select sum(closing_balance) INTO retval from
  ( SELECT sum(warehouses_data.closing_balance) as closing_balance
   FROM 
			warehouses
   Inner Join  warehouses_data  ON  warehouses.pk_id  =   warehouses_data.warehouse_id 
 	 Inner Join  stakeholders  ON  warehouses.stakeholder_office_id =   stakeholders.pk_id
   WHERE 
			 warehouses_data.item_pack_size_id = in_item 
		AND MONTH(warehouses_data.reporting_start_date) = in_month 
		AND YEAR(warehouses_data.reporting_start_date) = in_year
    AND  warehouses.province_id = in_prov 
		AND   stakeholders.geo_level_id=2
    UNION
    SELECT sum(hf_data_master.closing_balance) as closing_balance
    FROM 
			warehouses
   Inner Join  hf_data_master  ON  warehouses.pk_id  =   hf_data_master.warehouse_id 
 	 Inner Join  stakeholders  ON  warehouses.stakeholder_office_id =   stakeholders.pk_id
   WHERE 
			 hf_data_master.item_pack_size_id = in_item 
		AND MONTH(hf_data_master.reporting_start_date) = in_month 
		AND YEAR(hf_data_master.reporting_start_date) = in_year
    AND  warehouses.province_id = in_prov 
		AND   stakeholders.geo_level_id=2 ) A;


WHEN (in_type = 'V') THEN
-- Aggreate warehouse closing balance for selected province 
SELECT sum(closing_balance) INTO retval from   
(SELECT sum(warehouses_data.closing_balance) as closing_balance
   FROM 
			warehouses
   Inner Join  warehouses_data  ON  warehouses.pk_id  =   warehouses_data.warehouse_id 
 	 Inner Join  stakeholders ON  warehouses.stakeholder_office_id =   stakeholders.pk_id
   WHERE 
			 warehouses_data.item_pack_size_id = in_item 
		AND MONTH(warehouses_data.reporting_start_date) = in_month 
		AND YEAR(warehouses_data.reporting_start_date) = in_year
    AND  warehouses.district_id  in (SELECT
																					 locations.pk_id
																				FROM
																					 locations
																				WHERE
																					  locations.geo_level_id = 4
																				AND   locations.parent_id = in_prov)
		AND   stakeholders.geo_level_id>=3
   UNION
   SELECT sum(hf_data_master.closing_balance)  as closing_balance
   FROM 
			warehouses
   Inner Join  hf_data_master  ON  warehouses.pk_id  =   hf_data_master.warehouse_id 
 	 Inner Join  stakeholders ON  warehouses.stakeholder_office_id =   stakeholders.pk_id
   WHERE 
			 hf_data_master.item_pack_size_id = in_item 
		AND MONTH(hf_data_master.reporting_start_date) = in_month 
		AND YEAR(hf_data_master.reporting_start_date) = in_year
    AND  warehouses.district_id  in (SELECT
																					 locations.pk_id
																				FROM
																					 locations
																				WHERE
																					  locations.geo_level_id = 4
																				AND   locations.parent_id = in_prov)
		AND   stakeholders.geo_level_id>=3 ) A ;
  
WHEN (in_type = 'D') THEN
-- Aggreate warehouse closing balance for selected province 
SELECT sum(closing_balance) INTO retval  from (
   SELECT sum(warehouses_data.closing_balance) as closing_balance
   FROM 
			warehouses
   Inner Join  warehouses_data  ON  warehouses.pk_id  =   warehouses_data.warehouse_id 
 	 Inner Join  stakeholders ON  warehouses.stakeholder_office_id =   stakeholders.pk_id
   WHERE 
			 warehouses_data.item_pack_size_id = in_item 
		AND MONTH(warehouses_data.reporting_start_date) = in_month 
		AND YEAR(warehouses_data.reporting_start_date) = in_year
    AND  warehouses.district_id = in_prov 
		AND   stakeholders.geo_level_id >= 4
   UNION 
     SELECT sum(hf_data_master.closing_balance) as closing_balance
   FROM 
			warehouses
   Inner Join  hf_data_master  ON  warehouses.pk_id  =   hf_data_master.warehouse_id 
 	 Inner Join  stakeholders ON  warehouses.stakeholder_office_id =   stakeholders.pk_id
   WHERE 
			 hf_data_master.item_pack_size_id = in_item 
		AND MONTH(hf_data_master.reporting_start_date) = in_month 
		AND YEAR(hf_data_master.reporting_start_date) = in_year
    AND  warehouses.district_id = in_prov 
		AND   stakeholders.geo_level_id >= 4) A ; 

WHEN (in_type = 'DP') THEN
-- Aggreate warehouse closing balance for selected province 
   SELECT sum(closing_balance) INTO retval from
  (SELECT sum(warehouses_data.closing_balance) as closing_balance
   FROM 
			warehouses
   Inner Join  warehouses_data  ON  warehouses.pk_id  =   warehouses_data.warehouse_id 
 	 Inner Join  stakeholders ON  warehouses.stakeholder_office_id =   stakeholders.pk_id
   WHERE 
			 warehouses_data.item_pack_size_id = in_item 
		AND MONTH(warehouses_data.reporting_start_date) = in_month 
		AND YEAR(warehouses_data.reporting_start_date) = in_year
    AND  warehouses.province_id = in_prov 
		AND   stakeholders.geo_level_id = 4
    UNION 
     SELECT sum(hf_data_master.closing_balance) as closing_balance
   FROM 
			warehouses
   Inner Join  hf_data_master  ON  warehouses.pk_id  =   hf_data_master.warehouse_id 
 	 Inner Join  stakeholders ON  warehouses.stakeholder_office_id =   stakeholders.pk_id
   WHERE 
			 hf_data_master.item_pack_size_id = in_item 
		AND MONTH(hf_data_master.reporting_start_date) = in_month 
		AND YEAR(hf_data_master.reporting_start_date) = in_year
    AND  warehouses.province_id = in_prov 
		AND   stakeholders.geo_level_id = 4 ) A ;

WHEN (in_type = 'DW') THEN
-- Aggreate warehouse closing balance for selected province 
   SELECT sum(closing_balance) INTO retval from
  (SELECT sum(warehouses_data.closing_balance) as closing_balance
   FROM 
			warehouses
   Inner Join  warehouses_data  ON  warehouses.pk_id  =   warehouses_data.warehouse_id 
 	 Inner Join  stakeholders ON  warehouses.stakeholder_office_id =   stakeholders.pk_id
   WHERE 
			 warehouses_data.item_pack_size_id = in_item 
		AND  MONTH(warehouses_data.reporting_start_date) = in_month 
		AND  YEAR(warehouses_data.reporting_start_date) = in_year
    AND  warehouses.district_id = in_prov 
		AND   stakeholders.geo_level_id = 4
    UNION 
    SELECT sum(hf_data_master.closing_balance) as closing_balance
   FROM 
			warehouses
   Inner Join  hf_data_master  ON  warehouses.pk_id  =   hf_data_master.warehouse_id 
 	 Inner Join  stakeholders ON  warehouses.stakeholder_office_id =   stakeholders.pk_id
   WHERE 
			 hf_data_master.item_pack_size_id = in_item 
		AND  MONTH(hf_data_master.reporting_start_date) = in_month 
		AND  YEAR(hf_data_master.reporting_start_date) = in_year
    AND  warehouses.district_id = in_prov 
		AND   stakeholders.geo_level_id = 4) A;

WHEN (in_type = 'H') THEN
-- Aggreate warehouse closing balance for selected province 
   SELECT sum(closing_balance) INTO retval from 
   (SELECT sum(warehouses_data.closing_balance) as closing_balance
   FROM 
			warehouses
   Inner Join  warehouses_data  ON  warehouses.pk_id  =   warehouses_data.warehouse_id 
 	 Inner Join  stakeholders ON  warehouses.stakeholder_office_id =   stakeholders.pk_id
   WHERE 
			 warehouses_data.item_pack_size_id = in_item 
		AND  MONTH(warehouses_data.reporting_start_date) = in_month 
		AND  YEAR(warehouses_data.reporting_start_date) = in_year
    AND  warehouses.location_id    in (
																				SELECT
																					 locations.pk_id
																				FROM
																					 locations
																				WHERE
																					  locations.parent_id = in_prov)   
		AND   stakeholders.geo_level_id>=5 
   UNION
   SELECT sum(hf_data_master.closing_balance) as closing_balance
   FROM 
			warehouses
   Inner Join  hf_data_master  ON  warehouses.pk_id  =   hf_data_master.warehouse_id 
 	 Inner Join  stakeholders ON  warehouses.stakeholder_office_id =   stakeholders.pk_id
   WHERE 
			 hf_data_master.item_pack_size_id = in_item 
		AND  MONTH(hf_data_master.reporting_start_date) = in_month 
		AND  YEAR(hf_data_master.reporting_start_date) = in_year
    AND  warehouses.location_id    in (
																				SELECT
																					 locations.pk_id
																				FROM
																					 locations
																				WHERE
																					  locations.parent_id = in_prov)   
		AND   stakeholders.geo_level_id>=5) A;

WHEN (in_type = 'HW') THEN
-- Aggreate warehouse closing balance for selected province 
   SELECT sum(closing_balance) INTO retval 
from 
(SELECT sum(warehouses_data.closing_balance) as closing_balance
   FROM 
			warehouses
   Inner Join  warehouses_data  ON  warehouses.pk_id  =   warehouses_data.warehouse_id 
 	 Inner Join  stakeholders ON  warehouses.stakeholder_office_id =   stakeholders.pk_id
   WHERE 
			 warehouses_data.item_pack_size_id = in_item 
		AND MONTH(warehouses_data.reporting_start_date) = in_month 
		AND YEAR(warehouses_data.reporting_start_date) = in_year
		AND warehouses.location_id = in_prov
		AND stakeholders.geo_level_id=5
   UNION
   SELECT sum(hf_data_master.closing_balance) as closing_balance
   FROM 
			warehouses
   Inner Join  hf_data_master  ON  warehouses.pk_id  =   hf_data_master.warehouse_id 
 	 Inner Join  stakeholders ON  warehouses.stakeholder_office_id =   stakeholders.pk_id
   WHERE 
			 hf_data_master.item_pack_size_id = in_item 
		AND MONTH(hf_data_master.reporting_start_date) = in_month 
		AND YEAR(hf_data_master.reporting_start_date) = in_year
		AND warehouses.location_id = in_prov
		AND stakeholders.geo_level_id=5) A;

WHEN (in_type = 'U') THEN
-- Aggreate warehouse closing balance for selected districts
   SELECT sum(closing_balance) INTO retval from 
(SELECT sum(warehouses_data.closing_balance) as closing_balance
   FROM 
			warehouses
   Inner Join  warehouses_data  ON  warehouses.pk_id  =   warehouses_data.warehouse_id 
 	 Inner Join  stakeholders ON  warehouses.stakeholder_office_id =   stakeholders.pk_id
   WHERE 
			 warehouses_data.item_pack_size_id = in_item 
		AND MONTH(warehouses_data.reporting_start_date) = in_month 
		AND YEAR(warehouses_data.reporting_start_date) = in_year
    AND  warehouses.location_id   = in_prov 
		AND   stakeholders.geo_level_id=6
   UNION 
   SELECT sum(hf_data_master.closing_balance) as closing_balance
   FROM 
			warehouses
   Inner Join  hf_data_master  ON  warehouses.pk_id  =   hf_data_master.warehouse_id 
 	 Inner Join  stakeholders ON  warehouses.stakeholder_office_id =   stakeholders.pk_id
   WHERE 
			 hf_data_master.item_pack_size_id = in_item 
		AND MONTH(hf_data_master.reporting_start_date) = in_month 
		AND YEAR(hf_data_master.reporting_start_date) = in_year
    AND  warehouses.location_id   = in_prov 
		AND   stakeholders.geo_level_id=6) A;

WHEN (in_type = 'UP') THEN
-- Aggreate UC closing balance for selected province 
   SELECT sum(closing_balance) INTO retval FROM
  (SELECT sum(warehouses_data.closing_balance) as closing_balance
   FROM 
			warehouses
   Inner Join  warehouses_data  ON  warehouses.pk_id  =   warehouses_data.warehouse_id 
 	 Inner Join  stakeholders ON  warehouses.stakeholder_office_id =   stakeholders.pk_id
   WHERE 
			 warehouses_data.item_pack_size_id = in_item 
		AND  MONTH(warehouses_data.reporting_start_date) = in_month 
		AND  YEAR(warehouses_data.reporting_start_date) = in_year
    AND  warehouses.province_id= in_prov 
		AND   stakeholders.geo_level_id=6  
   UNION 
SELECT sum(hf_data_master.closing_balance) as closing_balance
   FROM 
			warehouses
   Inner Join  hf_data_master  ON  warehouses.pk_id  =   hf_data_master.warehouse_id 
 	 Inner Join  stakeholders ON  warehouses.stakeholder_office_id =   stakeholders.pk_id
   WHERE 
			 hf_data_master.item_pack_size_id = in_item 
		AND  MONTH(hf_data_master.reporting_start_date) = in_month 
		AND  YEAR(hf_data_master.reporting_start_date) = in_year
    AND  warehouses.province_id= in_prov 
		AND   stakeholders.geo_level_id=6        
 ) A;

WHEN (in_type = 'UD') THEN
-- Aggreate warehouse closing balance for selected province 
  SELECT sum(closing_balance) INTO retval FROM
( SELECT sum(warehouses_data.closing_balance) as closing_balance
   FROM 
   warehouses
   Inner Join  warehouses_data  ON  warehouses.pk_id  =   warehouses_data.warehouse_id 
   Inner Join  stakeholders ON  warehouses.stakeholder_office_id =   stakeholders.pk_id
   WHERE 
    warehouses_data.item_pack_size_id = in_item 
  AND  MONTH(warehouses_data.reporting_start_date) = in_month 
  AND  YEAR(warehouses_data.reporting_start_date) = in_year
    AND  warehouses.district_id  = in_prov 
  AND   stakeholders.geo_level_id=6 
UNION 
 SELECT sum(hf_data_master.closing_balance) as closing_balance
   FROM 
   warehouses
   Inner Join  hf_data_master  ON  warehouses.pk_id  =   hf_data_master.warehouse_id 
   Inner Join  stakeholders ON  warehouses.stakeholder_office_id =   stakeholders.pk_id
   WHERE 
    hf_data_master.item_pack_size_id = in_item 
  AND  MONTH(hf_data_master.reporting_start_date) = in_month 
  AND  YEAR(hf_data_master.reporting_start_date) = in_year
    AND  warehouses.district_id  = in_prov 
  AND   stakeholders.geo_level_id=6 )A;

WHEN (in_type = 'UW') THEN
-- Aggreate warehouse closing balance for selected province 
   SELECT sum(closing_balance) INTO retval from
   (SELECT sum(warehouses_data.closing_balance) as closing_balance
   FROM 
			warehouses
   Inner Join  warehouses_data  ON  warehouses.pk_id  =   warehouses_data.warehouse_id 
 	 Inner Join  stakeholders ON  warehouses.stakeholder_office_id =   stakeholders.pk_id
   WHERE 
			 warehouses_data.item_pack_size_id = in_item 
		AND  MONTH(warehouses_data.reporting_start_date) = in_month 
		AND  YEAR(warehouses_data.reporting_start_date) = in_year
    AND  warehouses.pk_id  = in_prov 
		AND   stakeholders.geo_level_id=6
    UNION 
    SELECT sum(hf_data_master.closing_balance) as closing_balance
   FROM 
			warehouses
   Inner Join  hf_data_master  ON  warehouses.pk_id  =   hf_data_master.warehouse_id 
 	 Inner Join  stakeholders ON  warehouses.stakeholder_office_id =   stakeholders.pk_id
   WHERE 
			 hf_data_master.item_pack_size_id = in_item 
		AND  MONTH(hf_data_master.reporting_start_date) = in_month 
		AND  YEAR(hf_data_master.reporting_start_date) = in_year
    AND  warehouses.pk_id  = in_prov 
		AND   stakeholders.geo_level_id=6)A  ;



/*
   WHEN (in_type = 'WS') THEN
 -- Aggreate warehouse closing balance for selected  stakeholders
    IF (wflag='CWH') THEN
			SELECT sum(warehouses_data.closing_balance)
          INTO retval
        FROM warehouses
         Inner Join  warehouses_data  ON  warehouses.pk_id  =   warehouses_data.warehouse_id 
				 Inner Join  stakeholders ON  warehouses.stakeholder_office_id =   stakeholders.pk_id
         WHERE  warehouses_data .item_id = in_item AND MONTH(warehouses_data.reporting_start_date) = in_month AND YEAR(warehouses_data.reporting_start_date) = in_year
         AND  warehouses.stakeholder_id   = in_stk  AND   stakeholders.stakeholder_type_id=0 and   stakeholders.geo_level_id=1;

    ELSE

     	SELECT sum(warehouses_data.closing_balance)
          INTO retval
        FROM warehouses
         Inner Join  warehouses_data  ON  warehouses.pk_id  =   warehouses_data.warehouse_id 
 				 Inner Join  stakeholders ON  warehouses.stakeholder_office_id =   stakeholders.pk_id
        WHERE  warehouses_data .item_id = in_item AND MONTH(warehouses_data.reporting_start_date) = in_month AND YEAR(warehouses_data.reporting_start_date) = in_year
         AND  warehouses.stakeholder_id   = in_stk and   stakeholders.geo_level_id=1;
    END IF;




  WHEN (in_type = 'WSP') THEN

			SELECT sum(warehouses_data.closing_balance)
          INTO retval
        FROM warehouses
         Inner Join  warehouses_data  ON  warehouses.pk_id  =   warehouses_data.warehouse_id 
 				 Inner Join  stakeholders ON  warehouses.stakeholder_office_id =   stakeholders.pk_id
        WHERE  warehouses_data .item_id = in_item AND MONTH(warehouses_data.reporting_start_date) = in_month AND YEAR(warehouses_data.reporting_start_date) = in_year
         AND  warehouses.stakeholder_id   = in_stk AND  warehouses.province_id = in_prov and   stakeholders.geo_level_id>=2;


 WHEN (in_type = 'WPD') THEN
-- Aggreate warehouse closing balance for selected  stakeholders and province
  SELECT sum(warehouses_data.closing_balance)
          INTO retval
        FROM warehouses
         Inner Join  warehouses_data  ON  warehouses.pk_id  =   warehouses_data.warehouse_id 
				 Inner Join  stakeholders ON  warehouses.stakeholder_office_id =   stakeholders.pk_id
         WHERE  warehouses_data .item_id = in_item AND MONTH(warehouses_data.reporting_start_date) = in_month AND YEAR(warehouses_data.reporting_start_date) = in_year
         AND  warehouses.location_id   = in_dist and   stakeholders.geo_level_id>=3;


  WHEN (in_type = 'WSPD') THEN
-- Aggreate warehouse closing balance for selected  stakeholders, province and district  sum(warehouses_data.closing_balance)

   SELECT       sum(warehouses_data.closing_balance)
  INTO retval
        FROM warehouses
         Inner Join  warehouses_data  ON  warehouses.pk_id  =   warehouses_data.warehouse_id 
 				 Inner Join  stakeholders ON  warehouses.stakeholder_office_id =   stakeholders.pk_id
        WHERE  warehouses_data .item_id = in_item AND MONTH(warehouses_data.reporting_start_date) = in_month AND YEAR(warehouses_data.reporting_start_date) = in_year
         AND  warehouses.stakeholder_id   = in_stk AND  warehouses.location_id   = in_dist and   stakeholders.geo_level_id=3;


 WHEN (in_type = 'T') THEN
-- Aggreate field + warehouse closing balance national
   SELECT sum(warehouses_data.closing_balance)
          INTO retval
        FROM warehouses
         Inner Join  warehouses_data  ON  warehouses.pk_id  =   warehouses_data.warehouse_id 
 				 Inner Join  stakeholders ON  warehouses.stakeholder_office_id =   stakeholders.pk_id
        WHERE  warehouses_data .item_id = in_item AND MONTH(warehouses_data.reporting_start_date) = in_month AND YEAR(warehouses_data.reporting_start_date) = in_year
         AND   stakeholders.stakeholder_type_id=0;

   WHEN (in_type = 'TS') THEN
-- Aggreate field + warehouse closing balance for selected  stakeholders
   SELECT sum(warehouses_data.closing_balance)
          INTO retval
        FROM warehouses
         Inner Join  warehouses_data  ON  warehouses.pk_id  =   warehouses_data.warehouse_id 
				 Inner Join  stakeholders ON  warehouses.stakeholder_office_id =   stakeholders.pk_id
         WHERE  warehouses_data .item_id = in_item AND MONTH(warehouses_data.reporting_start_date) = in_month AND YEAR(warehouses_data.reporting_start_date) = in_year
         AND  warehouses.stakeholder_id   = in_stk;

  

  WHEN (in_type = 'TSP') THEN
-- Aggreate field + warehouse closing balance for selected  stakeholders and province
  SELECT sum(warehouses_data.closing_balance)
          INTO retval
        FROM warehouses
         Inner Join  warehouses_data  ON  warehouses.pk_id  =   warehouses_data.warehouse_id 
				 Inner Join  stakeholders ON  warehouses.stakeholder_office_id =   stakeholders.pk_id
         WHERE  warehouses_data .item_id = in_item AND MONTH(warehouses_data.reporting_start_date) = in_month AND YEAR(warehouses_data.reporting_start_date) = in_year
         AND  warehouses.stakeholder_id   = in_stk AND  warehouses.province_id = in_prov
         AND  (stakeholders.geo_level_id>=2);

 WHEN (in_type = 'TPD') THEN
-- Aggreate field + warehouse closing balance for selected  stakeholders and province
  SELECT sum(warehouses_data.closing_balance)
          INTO retval
        FROM warehouses
         Inner Join  warehouses_data  ON  warehouses.pk_id  =   warehouses_data.warehouse_id 
				 Inner Join  stakeholders ON  warehouses.stakeholder_office_id =   stakeholders.pk_id
         WHERE  warehouses_data .item_id = in_item AND MONTH(warehouses_data.reporting_start_date) = in_month AND YEAR(warehouses_data.reporting_start_date) = in_year
         AND  warehouses.location_id   = in_dist
         AND   stakeholders.stakeholder_type_id=0 and (  stakeholders.geo_level_id>=3);

WHEN (in_type = 'XPD') THEN
-- Aggreate field + warehouse closing balance for selected  stakeholders and province
  SELECT sum(warehouses_data.closing_balance)
          INTO retval
        FROM warehouses
         Inner Join  warehouses_data  ON  warehouses.pk_id  =   warehouses_data.warehouse_id 
				 Inner Join  stakeholders ON  warehouses.stakeholder_office_id =   stakeholders.pk_id
         WHERE  warehouses_data .item_id = in_item AND MONTH(warehouses_data.reporting_start_date) = in_month AND YEAR(warehouses_data.reporting_start_date) = in_year
         AND  warehouses.location_id   = in_dist
         AND   stakeholders.stakeholder_type_id=1 and (stakeholders.geo_level_id=3);

  WHEN (in_type = 'TSPD') THEN
-- Aggreate field + warehouse closing balance for selected  stakeholders, province and district sum(warehouses_data.closing_balance)
   SELECT '100' as a
          INTO retval
        FROM warehouses
         Inner Join  warehouses_data  ON  warehouses.pk_id  =   warehouses_data.warehouse_id 
				 Inner Join  stakeholders ON  warehouses.stakeholder_office_id =   stakeholders.pk_id
         WHERE  warehouses_data .item_id = in_item AND MONTH(warehouses_data.reporting_start_date) = in_month AND YEAR(warehouses_data.reporting_start_date) = in_year
         AND  warehouses.stakeholder_id   = in_stk  AND  warehouses.location_id   = in_dist
         AND   stakeholders.stakeholder_type_id=0 and (  stakeholders.geo_level_id>=3) limit 1;
*/
 END CASE;

 -- SET retval = IFNULL(retval,0);
 return retval;


END
;;
DELIMITER ;

-- ----------------------------
-- Function structure for REPgetCB_copy
-- ----------------------------
DROP FUNCTION IF EXISTS `REPgetCB_copy`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `REPgetCB_copy`(`in_type` varchar(8),`in_month` int,`in_year` int,`in_item` varchar(20),`in_stk` int,`in_prov` int,`in_dist` varchar(8)) RETURNS double
    DETERMINISTIC
BEGIN

 
  DECLARE retval DOUBLE DEFAULT 0;

    -- Declare '_val' variables to read in each record from the cursor
 

--	DECLARE wflag  VARCHAR(10);



 --   stakeholders, province, district flags
/*
IF INSTR(in_type,'1') > 0 THEN
 SET wflag = 'CWH';
 SET in_type = REPLACE(in_type,1,'');
END IF;

IF INSTR(in_type,'2') > 0 THEN
 SET wflag = 'PPIU';
 SET in_type = REPLACE(in_type,2,'');
END IF;
*/

   CASE
  WHEN (in_type = 'N') THEN
-- Aggreate warehouse closing balance national
		SELECT
			sum(warehouses_data.closing_balance) INTO retval
		FROM
			warehouses
		INNER JOIN  warehouses_data  ON  warehouses.pk_id = warehouses_data.warehouse_id
		INNER JOIN stakeholders ON   warehouses.stakeholder_office_id=  stakeholders.pk_id
		WHERE
			warehouses_data.item_pack_size_id = in_item
		AND    MONTH(warehouses_data.reporting_start_date) = in_month
		AND   YEAR(warehouses_data.reporting_start_date) = in_year
		AND    stakeholders.geo_level_id >= 1;

  WHEN (in_type = 'NW') THEN
-- Aggreate warehouse closing balance national
		SELECT
			sum(warehouses_data.closing_balance) INTO retval
		FROM
			warehouses
		INNER JOIN   warehouses_data   ON    warehouses.pk_id  =   warehouses_data.warehouse_id 
		INNER JOIN  stakeholders  ON   warehouses.stakeholder_office_id =   stakeholders.pk_id
		WHERE
			 warehouses_data.item_pack_size_id = in_item
		AND MONTH(warehouses_data.reporting_start_date) = in_month
		AND YEAR(warehouses_data.reporting_start_date) = in_year
		AND   stakeholders.geo_level_id = 1;


  WHEN (in_type = 'P') THEN
-- Aggreate warehouse closing balance for selected province 
   SELECT sum(warehouses_data.closing_balance) INTO retval
   FROM 
			warehouses
   Inner Join  warehouses_data  ON  warehouses.pk_id  =   warehouses_data.warehouse_id 
 	 Inner Join  stakeholders ON  warehouses.stakeholder_office_id =   stakeholders.pk_id
   WHERE 
			 warehouses_data.item_pack_size_id = in_item 
		AND MONTH(warehouses_data.reporting_start_date) = in_month 
		AND YEAR(warehouses_data.reporting_start_date) = in_year
    AND  warehouses.province_id = in_prov 
		AND   stakeholders.geo_level_id>=2;

 WHEN (in_type = 'PW') THEN
-- Aggreate warehouse closing balance for selected province 
   SELECT sum(warehouses_data.closing_balance) INTO retval
   FROM 
			warehouses
   Inner Join  warehouses_data  ON  warehouses.pk_id  =   warehouses_data.warehouse_id 
 	 Inner Join  stakeholders  ON  warehouses.stakeholder_office_id =   stakeholders.pk_id
   WHERE 
			 warehouses_data.item_pack_size_id = in_item 
		AND MONTH(warehouses_data.reporting_start_date) = in_month 
		AND YEAR(warehouses_data.reporting_start_date) = in_year
    AND  warehouses.province_id = in_prov 
		AND   stakeholders.geo_level_id=2;


WHEN (in_type = 'V') THEN
-- Aggreate warehouse closing balance for selected province 
   SELECT sum(warehouses_data.closing_balance) INTO retval
   FROM 
			warehouses
   Inner Join  warehouses_data  ON  warehouses.pk_id  =   warehouses_data.warehouse_id 
 	 Inner Join  stakeholders ON  warehouses.stakeholder_office_id =   stakeholders.pk_id
   WHERE 
			 warehouses_data.item_pack_size_id = in_item 
		AND MONTH(warehouses_data.reporting_start_date) = in_month 
		AND YEAR(warehouses_data.reporting_start_date) = in_year
    AND  warehouses.district_id  in (SELECT
																					 locations.pk_id
																				FROM
																					 locations
																				WHERE
																					  locations.geo_level_id = 4
																				AND   locations.parent_id = in_prov)
		AND   stakeholders.geo_level_id>=3;
  
WHEN (in_type = 'D') THEN
-- Aggreate warehouse closing balance for selected province 
   SELECT sum(warehouses_data.closing_balance) INTO retval
   FROM 
			warehouses
   Inner Join  warehouses_data  ON  warehouses.pk_id  =   warehouses_data.warehouse_id 
 	 Inner Join  stakeholders ON  warehouses.stakeholder_office_id =   stakeholders.pk_id
   WHERE 
			 warehouses_data.item_pack_size_id = in_item 
		AND MONTH(warehouses_data.reporting_start_date) = in_month 
		AND YEAR(warehouses_data.reporting_start_date) = in_year
    AND  warehouses.district_id = in_prov 
		AND   stakeholders.geo_level_id >= 4;

WHEN (in_type = 'DP') THEN
-- Aggreate warehouse closing balance for selected province 
   SELECT sum(warehouses_data.closing_balance) INTO retval
   FROM 
			warehouses
   Inner Join  warehouses_data  ON  warehouses.pk_id  =   warehouses_data.warehouse_id 
 	 Inner Join  stakeholders ON  warehouses.stakeholder_office_id =   stakeholders.pk_id
   WHERE 
			 warehouses_data.item_pack_size_id = in_item 
		AND MONTH(warehouses_data.reporting_start_date) = in_month 
		AND YEAR(warehouses_data.reporting_start_date) = in_year
    AND  warehouses.province_id = in_prov 
		AND   stakeholders.geo_level_id = 4;

WHEN (in_type = 'DW') THEN
-- Aggreate warehouse closing balance for selected province 
   SELECT sum(warehouses_data.closing_balance) INTO retval
   FROM 
			warehouses
   Inner Join  warehouses_data  ON  warehouses.pk_id  =   warehouses_data.warehouse_id 
 	 Inner Join  stakeholders ON  warehouses.stakeholder_office_id =   stakeholders.pk_id
   WHERE 
			 warehouses_data.item_pack_size_id = in_item 
		AND  MONTH(warehouses_data.reporting_start_date) = in_month 
		AND  YEAR(warehouses_data.reporting_start_date) = in_year
    AND  warehouses.district_id = in_prov 
		AND   stakeholders.geo_level_id = 4;

WHEN (in_type = 'H') THEN
-- Aggreate warehouse closing balance for selected province 
   SELECT sum(warehouses_data.closing_balance) INTO retval
   FROM 
			warehouses
   Inner Join  warehouses_data  ON  warehouses.pk_id  =   warehouses_data.warehouse_id 
 	 Inner Join  stakeholders ON  warehouses.stakeholder_office_id =   stakeholders.pk_id
   WHERE 
			 warehouses_data.item_pack_size_id = in_item 
		AND  MONTH(warehouses_data.reporting_start_date) = in_month 
		AND  YEAR(warehouses_data.reporting_start_date) = in_year
    
AND  warehouses.location_id    in (
																				SELECT
																					 locations.pk_id
																				FROM
																					 locations
																				WHERE
																					  locations.parent_id = in_prov)   
		AND   stakeholders.geo_level_id>=5;

WHEN (in_type = 'U') THEN
-- Aggreate warehouse closing balance for selected districts
   SELECT sum(warehouses_data.closing_balance) INTO retval
   FROM 
			warehouses
   Inner Join  warehouses_data  ON  warehouses.pk_id  =   warehouses_data.warehouse_id 
 	 Inner Join  stakeholders ON  warehouses.stakeholder_office_id =   stakeholders.pk_id
   WHERE 
			 warehouses_data.item_pack_size_id = in_item 
		AND MONTH(warehouses_data.reporting_start_date) = in_month 
		AND YEAR(warehouses_data.reporting_start_date) = in_year
    AND  warehouses.location_id   = in_prov 
		AND   stakeholders.geo_level_id=6;

WHEN (in_type = 'UP') THEN
-- Aggreate UC closing balance for selected province 
   SELECT sum(warehouses_data.closing_balance) INTO retval
   FROM 
			warehouses
   Inner Join  warehouses_data  ON  warehouses.pk_id  =   warehouses_data.warehouse_id 
 	 Inner Join  stakeholders ON  warehouses.stakeholder_office_id =   stakeholders.pk_id
   WHERE 
			 warehouses_data.item_pack_size_id = in_item 
		AND  MONTH(warehouses_data.reporting_start_date) = in_month 
		AND  YEAR(warehouses_data.reporting_start_date) = in_year
    AND  warehouses.province_id= in_prov 
		AND   stakeholders.geo_level_id=6;

WHEN (in_type = 'UD') THEN
-- Aggreate warehouse closing balance for selected province 
   SELECT sum(warehouses_data.closing_balance) INTO retval
   FROM 
   warehouses
   Inner Join  warehouses_data  ON  warehouses.pk_id  =   warehouses_data.warehouse_id 
   Inner Join  stakeholders ON  warehouses.stakeholder_office_id =   stakeholders.pk_id
   WHERE 
    warehouses_data.item_pack_size_id = in_item 
  AND  MONTH(warehouses_data.reporting_start_date) = in_month 
  AND  YEAR(warehouses_data.reporting_start_date) = in_year
    AND  warehouses.district_id  = in_prov 
  AND   stakeholders.geo_level_id=6;

WHEN (in_type = 'UW') THEN
-- Aggreate warehouse closing balance for selected province 
   SELECT sum(warehouses_data.closing_balance) INTO retval
   FROM 
			warehouses
   Inner Join  warehouses_data  ON  warehouses.pk_id  =   warehouses_data.warehouse_id 
 	 Inner Join  stakeholders ON  warehouses.stakeholder_office_id =   stakeholders.pk_id
   WHERE 
			 warehouses_data.item_pack_size_id = in_item 
		AND  MONTH(warehouses_data.reporting_start_date) = in_month 
		AND  YEAR(warehouses_data.reporting_start_date) = in_year
    AND  warehouses.pk_id  = in_prov 
		AND   stakeholders.geo_level_id=6;



/*
   WHEN (in_type = 'WS') THEN
 -- Aggreate warehouse closing balance for selected  stakeholders
    IF (wflag='CWH') THEN
			SELECT sum(warehouses_data.closing_balance)
          INTO retval
        FROM warehouses
         Inner Join  warehouses_data  ON  warehouses.pk_id  =   warehouses_data.warehouse_id 
				 Inner Join  stakeholders ON  warehouses.stakeholder_office_id =   stakeholders.pk_id
         WHERE  warehouses_data .item_id = in_item AND MONTH(warehouses_data.reporting_start_date) = in_month AND YEAR(warehouses_data.reporting_start_date) = in_year
         AND  warehouses.stakeholder_id   = in_stk  AND   stakeholders.stakeholder_type_id=0 and   stakeholders.geo_level_id=1;

    ELSE

     	SELECT sum(warehouses_data.closing_balance)
          INTO retval
        FROM warehouses
         Inner Join  warehouses_data  ON  warehouses.pk_id  =   warehouses_data.warehouse_id 
 				 Inner Join  stakeholders ON  warehouses.stakeholder_office_id =   stakeholders.pk_id
        WHERE  warehouses_data .item_id = in_item AND MONTH(warehouses_data.reporting_start_date) = in_month AND YEAR(warehouses_data.reporting_start_date) = in_year
         AND  warehouses.stakeholder_id   = in_stk and   stakeholders.geo_level_id=1;
    END IF;




  WHEN (in_type = 'WSP') THEN

			SELECT sum(warehouses_data.closing_balance)
          INTO retval
        FROM warehouses
         Inner Join  warehouses_data  ON  warehouses.pk_id  =   warehouses_data.warehouse_id 
 				 Inner Join  stakeholders ON  warehouses.stakeholder_office_id =   stakeholders.pk_id
        WHERE  warehouses_data .item_id = in_item AND MONTH(warehouses_data.reporting_start_date) = in_month AND YEAR(warehouses_data.reporting_start_date) = in_year
         AND  warehouses.stakeholder_id   = in_stk AND  warehouses.province_id = in_prov and   stakeholders.geo_level_id>=2;


 WHEN (in_type = 'WPD') THEN
-- Aggreate warehouse closing balance for selected  stakeholders and province
  SELECT sum(warehouses_data.closing_balance)
          INTO retval
        FROM warehouses
         Inner Join  warehouses_data  ON  warehouses.pk_id  =   warehouses_data.warehouse_id 
				 Inner Join  stakeholders ON  warehouses.stakeholder_office_id =   stakeholders.pk_id
         WHERE  warehouses_data .item_id = in_item AND MONTH(warehouses_data.reporting_start_date) = in_month AND YEAR(warehouses_data.reporting_start_date) = in_year
         AND  warehouses.location_id   = in_dist and   stakeholders.geo_level_id>=3;


  WHEN (in_type = 'WSPD') THEN
-- Aggreate warehouse closing balance for selected  stakeholders, province and district  sum(warehouses_data.closing_balance)

   SELECT       sum(warehouses_data.closing_balance)
  INTO retval
        FROM warehouses
         Inner Join  warehouses_data  ON  warehouses.pk_id  =   warehouses_data.warehouse_id 
 				 Inner Join  stakeholders ON  warehouses.stakeholder_office_id =   stakeholders.pk_id
        WHERE  warehouses_data .item_id = in_item AND MONTH(warehouses_data.reporting_start_date) = in_month AND YEAR(warehouses_data.reporting_start_date) = in_year
         AND  warehouses.stakeholder_id   = in_stk AND  warehouses.location_id   = in_dist and   stakeholders.geo_level_id=3;


 WHEN (in_type = 'T') THEN
-- Aggreate field + warehouse closing balance national
   SELECT sum(warehouses_data.closing_balance)
          INTO retval
        FROM warehouses
         Inner Join  warehouses_data  ON  warehouses.pk_id  =   warehouses_data.warehouse_id 
 				 Inner Join  stakeholders ON  warehouses.stakeholder_office_id =   stakeholders.pk_id
        WHERE  warehouses_data .item_id = in_item AND MONTH(warehouses_data.reporting_start_date) = in_month AND YEAR(warehouses_data.reporting_start_date) = in_year
         AND   stakeholders.stakeholder_type_id=0;

   WHEN (in_type = 'TS') THEN
-- Aggreate field + warehouse closing balance for selected  stakeholders
   SELECT sum(warehouses_data.closing_balance)
          INTO retval
        FROM warehouses
         Inner Join  warehouses_data  ON  warehouses.pk_id  =   warehouses_data.warehouse_id 
				 Inner Join  stakeholders ON  warehouses.stakeholder_office_id =   stakeholders.pk_id
         WHERE  warehouses_data .item_id = in_item AND MONTH(warehouses_data.reporting_start_date) = in_month AND YEAR(warehouses_data.reporting_start_date) = in_year
         AND  warehouses.stakeholder_id   = in_stk;

  

  WHEN (in_type = 'TSP') THEN
-- Aggreate field + warehouse closing balance for selected  stakeholders and province
  SELECT sum(warehouses_data.closing_balance)
          INTO retval
        FROM warehouses
         Inner Join  warehouses_data  ON  warehouses.pk_id  =   warehouses_data.warehouse_id 
				 Inner Join  stakeholders ON  warehouses.stakeholder_office_id =   stakeholders.pk_id
         WHERE  warehouses_data .item_id = in_item AND MONTH(warehouses_data.reporting_start_date) = in_month AND YEAR(warehouses_data.reporting_start_date) = in_year
         AND  warehouses.stakeholder_id   = in_stk AND  warehouses.province_id = in_prov
         AND  (stakeholders.geo_level_id>=2);

 WHEN (in_type = 'TPD') THEN
-- Aggreate field + warehouse closing balance for selected  stakeholders and province
  SELECT sum(warehouses_data.closing_balance)
          INTO retval
        FROM warehouses
         Inner Join  warehouses_data  ON  warehouses.pk_id  =   warehouses_data.warehouse_id 
				 Inner Join  stakeholders ON  warehouses.stakeholder_office_id =   stakeholders.pk_id
         WHERE  warehouses_data .item_id = in_item AND MONTH(warehouses_data.reporting_start_date) = in_month AND YEAR(warehouses_data.reporting_start_date) = in_year
         AND  warehouses.location_id   = in_dist
         AND   stakeholders.stakeholder_type_id=0 and (  stakeholders.geo_level_id>=3);

WHEN (in_type = 'XPD') THEN
-- Aggreate field + warehouse closing balance for selected  stakeholders and province
  SELECT sum(warehouses_data.closing_balance)
          INTO retval
        FROM warehouses
         Inner Join  warehouses_data  ON  warehouses.pk_id  =   warehouses_data.warehouse_id 
				 Inner Join  stakeholders ON  warehouses.stakeholder_office_id =   stakeholders.pk_id
         WHERE  warehouses_data .item_id = in_item AND MONTH(warehouses_data.reporting_start_date) = in_month AND YEAR(warehouses_data.reporting_start_date) = in_year
         AND  warehouses.location_id   = in_dist
         AND   stakeholders.stakeholder_type_id=1 and (stakeholders.geo_level_id=3);

  WHEN (in_type = 'TSPD') THEN
-- Aggreate field + warehouse closing balance for selected  stakeholders, province and district sum(warehouses_data.closing_balance)
   SELECT '100' as a
          INTO retval
        FROM warehouses
         Inner Join  warehouses_data  ON  warehouses.pk_id  =   warehouses_data.warehouse_id 
				 Inner Join  stakeholders ON  warehouses.stakeholder_office_id =   stakeholders.pk_id
         WHERE  warehouses_data .item_id = in_item AND MONTH(warehouses_data.reporting_start_date) = in_month AND YEAR(warehouses_data.reporting_start_date) = in_year
         AND  warehouses.stakeholder_id   = in_stk  AND  warehouses.location_id   = in_dist
         AND   stakeholders.stakeholder_type_id=0 and (  stakeholders.geo_level_id>=3) limit 1;
*/
 END CASE;

 -- SET retval = IFNULL(retval,0);
 return retval;


END
;;
DELIMITER ;

-- ----------------------------
-- Function structure for REPgetCBWHData
-- ----------------------------
DROP FUNCTION IF EXISTS `REPgetCBWHData`;
DELIMITER ;;
CREATE DEFINER=`vlmis`@`%` FUNCTION `REPgetCBWHData`(in_month INTEGER, in_year INTEGER,  in_item INTEGER, in_wh INTEGER) RETURNS int(20)
    READS SQL DATA
    DETERMINISTIC
BEGIN
	DECLARE retval INTEGER;
	DECLARE receive INTEGER;
	DECLARE issue INTEGER;
	DECLARE adjustment INTEGER;

	SELECT
		IFNULL(SUM(ABS(stock_detail.quantity)),0) INTO receive 
	FROM
		stock_master
	INNER JOIN stock_detail ON stock_detail.stock_master_id = stock_master.pk_id
	INNER JOIN stock_batch ON stock_detail.stock_batch_id = stock_batch.pk_id
	WHERE
		stock_master.to_warehouse_id = in_wh
	AND stock_batch.item_pack_size_id = in_item
	AND stock_master.transaction_type_id = 1 
	AND stock_master.transaction_date < DATE_ADD(CONCAT(in_year,'-',in_month,'-01'),INTERVAL 1 MONTH);

  SELECT
		IFNULL(SUM(ABS(stock_detail.quantity)),0) INTO issue 
	FROM
		stock_master
	INNER JOIN stock_detail ON stock_detail.stock_master_id = stock_master.pk_id
	INNER JOIN stock_batch ON stock_detail.stock_batch_id = stock_batch.pk_id
	WHERE
		stock_master.from_warehouse_id = in_wh
	AND stock_batch.item_pack_size_id = in_item
  AND stock_master.transaction_type_id = 2
	AND stock_master.transaction_date < DATE_ADD(CONCAT(in_year,'-',in_month,'-01'),INTERVAL 1 MONTH);

  SELECT
		IFNULL(SUM(stock_detail.quantity),0) INTO adjustment
	FROM
		stock_master
	INNER JOIN stock_detail ON stock_detail.stock_master_id = stock_master.pk_id
	INNER JOIN stock_batch ON stock_detail.stock_batch_id = stock_batch.pk_id
	WHERE
		stock_master.from_warehouse_id = in_wh
	AND stock_batch.item_pack_size_id = in_item
	AND stock_master.transaction_type_id > 2
	AND stock_master.transaction_date < DATE_ADD(CONCAT(in_year,'-',in_month,'-01'),INTERVAL 1 MONTH);

  SET retval = (receive + adjustment) - issue;
 
	RETURN (retval);
END
;;
DELIMITER ;

-- ----------------------------
-- Function structure for REPgetConsumption
-- ----------------------------
DROP FUNCTION IF EXISTS `REPgetConsumption`;
DELIMITER ;;
CREATE DEFINER=`vlmis`@`%` FUNCTION `REPgetConsumption`(`in_month` int,`in_year` int,`in_item` int,`in_stk` int,`in_loc_level` varchar(8),`in_loc` int) RETURNS varchar(10) CHARSET latin1
    DETERMINISTIC
BEGIN

/* Written by Wasif Raza Mirza - Oct 13 */

DECLARE retval DOUBLE DEFAULT 0;

/* consumption is present on what level: in vLMIS it is on UC level which is 6th level*/
DECLARE c_level INTEGER DEFAULT 6; 

CASE 
WHEN (in_loc_level = 'N') THEN
  /*  Aggreate National Consumption */
   SELECT sum(issue_balance) INTO retval from (
         SELECT sum( warehouses_data.issue_balance) as issue_balance
         FROM warehouses
         Inner Join  warehouses_data  ON  warehouses.pk_id  =   warehouses_data.warehouse_id 
				 Inner Join  stakeholders ON  warehouses.stakeholder_office_id =   stakeholders.pk_id
         WHERE  warehouses_data.item_pack_size_id = in_item
         AND  warehouses.pk_id  =   warehouses_data.warehouse_id  
         AND MONTH(warehouses_data.reporting_start_date) = in_month 
         AND YEAR(warehouses_data.reporting_start_date) = in_year
         AND   stakeholders.geo_level_id=c_level
         UNION 
         SELECT sum( hf_data_master.issue_balance) as issue_balance
         FROM warehouses
         Inner Join  hf_data_master  ON  warehouses.pk_id  =   hf_data_master.warehouse_id 
				 Inner Join  stakeholders ON  warehouses.stakeholder_office_id =   stakeholders.pk_id
         WHERE  hf_data_master.item_pack_size_id = in_item
         AND  warehouses.pk_id  =   hf_data_master.warehouse_id  
         AND MONTH(hf_data_master.reporting_start_date) = in_month 
         AND YEAR(hf_data_master.reporting_start_date) = in_year
         AND   stakeholders.geo_level_id=c_level) A ;

WHEN (in_loc_level  = 'P') THEN
/*Aggreate Consumption for selected province*/
  SELECT sum(issue_balance) INTO retval FROM
   ( SELECT sum( warehouses_data.issue_balance) as issue_balance
          
        FROM warehouses
         Inner Join  warehouses_data  ON  warehouses.pk_id  =   warehouses_data.warehouse_id 
				 Inner Join  stakeholders ON  warehouses.stakeholder_office_id =   stakeholders.pk_id
         WHERE  warehouses_data.item_pack_size_id = in_item 
				 AND MONTH(warehouses_data.reporting_start_date) = in_month AND YEAR(warehouses_data.reporting_start_date) = in_year
         AND  warehouses.province_id = in_loc
         AND   stakeholders.geo_level_id=c_level
   UNION
   SELECT sum( hf_data_master.issue_balance) as issue_balance
          
        FROM warehouses
         Inner Join  hf_data_master  ON  warehouses.pk_id  =   hf_data_master.warehouse_id 
				 Inner Join  stakeholders ON  warehouses.stakeholder_office_id =   stakeholders.pk_id
         WHERE  hf_data_master.item_pack_size_id = in_item 
				 AND MONTH(hf_data_master.reporting_start_date) = in_month AND YEAR(hf_data_master.reporting_start_date) = in_year
         AND  warehouses.province_id = in_loc
         AND   stakeholders.geo_level_id=c_level) A;

WHEN (in_loc_level  = 'UP') THEN
/*Aggreate Consumption for selected province*/
 SELECT sum(issue_balance) INTO retval FROM
  ( SELECT sum( warehouses_data.issue_balance) as issue_balance
        FROM warehouses
         Inner Join  warehouses_data  ON  warehouses.pk_id  =   warehouses_data.warehouse_id 
				 Inner Join  stakeholders ON  warehouses.stakeholder_office_id =   stakeholders.pk_id
         WHERE  warehouses_data.item_pack_size_id = in_item 
				 AND MONTH(warehouses_data.reporting_start_date) = in_month AND YEAR(warehouses_data.reporting_start_date) = in_year
         AND  warehouses.province_id = in_loc
         AND   stakeholders.geo_level_id=c_level
    UNION 
   SELECT sum( hf_data_master.issue_balance) as issue_balance
        FROM warehouses
         Inner Join  hf_data_master  ON  warehouses.pk_id  =   hf_data_master.warehouse_id 
				 Inner Join  stakeholders ON  warehouses.stakeholder_office_id =   stakeholders.pk_id
         WHERE  hf_data_master.item_pack_size_id = in_item 
				 AND MONTH(hf_data_master.reporting_start_date) = in_month AND YEAR(hf_data_master.reporting_start_date) = in_year
         AND  warehouses.province_id = in_loc
         AND   stakeholders.geo_level_id=c_level ) A;

 WHEN (in_loc_level  = 'V') THEN
/*Aggreate Consumption for selected province*/
   SELECT sum(issue_balance) INTO retval FROM
(SELECT sum( warehouses_data.issue_balance) as issue_balance
        FROM warehouses
         Inner Join  warehouses_data  ON  warehouses.pk_id  =   warehouses_data.warehouse_id 
				 Inner Join  stakeholders ON  warehouses.stakeholder_office_id =   stakeholders.pk_id
         WHERE  warehouses_data.item_pack_size_id = in_item 
				 AND MONTH(warehouses_data.reporting_start_date) = in_month AND YEAR(warehouses_data.reporting_start_date) = in_year
				 AND  warehouses.pk_id  =   warehouses_data.warehouse_id  
				 AND  warehouses.district_id in (SELECT
																					 locations.pk_id
																				FROM
																					 locations
																				WHERE
																					  locations.geo_level_id = 4
																				AND   locations.parent_id = in_loc)
         AND   stakeholders.geo_level_id=c_level
 UNION 
   SELECT sum( hf_data_master.issue_balance) as issue_balance
         FROM warehouses
         Inner Join  hf_data_master  ON  warehouses.pk_id  =   hf_data_master.warehouse_id 
				 Inner Join  stakeholders ON  warehouses.stakeholder_office_id =   stakeholders.pk_id
         WHERE  hf_data_master.item_pack_size_id = in_item 
				 AND MONTH(hf_data_master.reporting_start_date) = in_month AND YEAR(hf_data_master.reporting_start_date) = in_year
				 AND  warehouses.pk_id  =   hf_data_master.warehouse_id  
				 AND  warehouses.district_id in (SELECT
																					 locations.pk_id
																				FROM
																					 locations
																				WHERE
																					  locations.geo_level_id = 4
																				AND   locations.parent_id = in_loc)
         AND   stakeholders.geo_level_id=c_level) A;


WHEN (in_loc_level  = 'D') THEN
/*Aggreate Consumption for selected province*/
   SELECT sum(issue_balance) INTO retval FROM
       (SELECT sum( warehouses_data.issue_balance) as issue_balance
        
        FROM warehouses
         Inner Join  warehouses_data  ON  warehouses.pk_id  =   warehouses_data.warehouse_id 
				 Inner Join  stakeholders  ON  warehouses.stakeholder_office_id =   stakeholders.pk_id
         WHERE  warehouses_data.item_pack_size_id = in_item 
				 AND MONTH(warehouses_data.reporting_start_date) = in_month AND YEAR(warehouses_data.reporting_start_date) = in_year
				 AND  warehouses.pk_id  =   warehouses_data.warehouse_id  
				 AND  warehouses.district_id = in_loc
         AND   stakeholders.geo_level_id=c_level
   UNION  
   SELECT sum( hf_data_master.issue_balance) as issue_balance
        
        FROM warehouses
         Inner Join  hf_data_master  ON  warehouses.pk_id  =   hf_data_master.warehouse_id 
				 Inner Join  stakeholders  ON  warehouses.stakeholder_office_id =   stakeholders.pk_id
         WHERE  hf_data_master.item_pack_size_id = in_item 
				 AND MONTH(hf_data_master.reporting_start_date) = in_month AND YEAR(hf_data_master.reporting_start_date) = in_year
				 AND  warehouses.pk_id  =   hf_data_master.warehouse_id  
				 AND  warehouses.district_id = in_loc
         AND   stakeholders.geo_level_id=c_level) A;

WHEN (in_loc_level  = 'DW') THEN
/*Aggreate Consumption for selected province*/
SELECT sum(issue_balance) INTO retval from
   (SELECT sum( warehouses_data.issue_balance) as issue_balance
         FROM warehouses
         Inner Join  warehouses_data  ON  warehouses.pk_id  =   warehouses_data.warehouse_id 
				 Inner Join  stakeholders  ON  warehouses.stakeholder_office_id =   stakeholders.pk_id
         WHERE  warehouses_data.item_pack_size_id = in_item 
				 AND MONTH(warehouses_data.reporting_start_date) = in_month AND YEAR(warehouses_data.reporting_start_date) = in_year
				 AND  warehouses.pk_id  =   warehouses_data.warehouse_id  
				 AND  warehouses.district_id = in_loc
         AND   stakeholders.geo_level_id=c_level
         UNION 
         SELECT sum( hf_data_master.issue_balance) as issue_balance
         FROM warehouses
         Inner Join  hf_data_master  ON  warehouses.pk_id  =   hf_data_master.warehouse_id 
				 Inner Join  stakeholders  ON  warehouses.stakeholder_office_id =   stakeholders.pk_id
         WHERE  hf_data_master.item_pack_size_id = in_item 
				 AND MONTH(hf_data_master.reporting_start_date) = in_month AND YEAR(hf_data_master.reporting_start_date) = in_year
				 AND  warehouses.pk_id  =   hf_data_master.warehouse_id  
				 AND  warehouses.district_id = in_loc
         AND   stakeholders.geo_level_id=c_level ) A  ;

WHEN (in_loc_level  = 'DP') THEN
/*Aggreate Consumption for selected province*/
   SELECT sum(issue_balance) INTO retval FROM
   (SELECT sum( warehouses_data.issue_balance) as issue_balance
         
        FROM warehouses
         Inner Join  warehouses_data  ON  warehouses.pk_id  =   warehouses_data.warehouse_id 
				 Inner Join  stakeholders ON  warehouses.stakeholder_office_id =   stakeholders.pk_id
         WHERE  warehouses_data.item_pack_size_id = in_item 
				 AND MONTH(warehouses_data.reporting_start_date) = in_month AND YEAR(warehouses_data.reporting_start_date) = in_year
				 AND  warehouses.pk_id  =   warehouses_data.warehouse_id  
				 AND  warehouses.province_id = in_loc
         AND   stakeholders.geo_level_id=c_level
    UNION 
   SELECT sum( hf_data_master.issue_balance) as issue_balance
          
        FROM warehouses
         Inner Join  hf_data_master  ON  warehouses.pk_id  =   hf_data_master.warehouse_id 
				 Inner Join  stakeholders ON  warehouses.stakeholder_office_id =   stakeholders.pk_id
         WHERE  hf_data_master.item_pack_size_id = in_item 
				 AND MONTH(hf_data_master.reporting_start_date) = in_month AND YEAR(hf_data_master.reporting_start_date) = in_year
				 AND  warehouses.pk_id  =   hf_data_master.warehouse_id  
				 AND  warehouses.province_id = in_loc
         AND   stakeholders.geo_level_id=c_level)A ;

 WHEN (in_loc_level  = 'H') THEN
/*Aggreate Consumption for selected province*/
   SELECT sum(issue_balance) INTO retval FROM
   (SELECT sum( warehouses_data.issue_balance) as issue_balance
        
        FROM warehouses
         Inner Join  warehouses_data  ON  warehouses.pk_id  =   warehouses_data.warehouse_id 
				 Inner Join  stakeholders ON  warehouses.stakeholder_office_id =   stakeholders.pk_id
         WHERE  warehouses_data.item_pack_size_id = in_item 
				 AND MONTH(warehouses_data.reporting_start_date) = in_month AND YEAR(warehouses_data.reporting_start_date) = in_year
				 AND  warehouses.pk_id  =   warehouses_data.warehouse_id  
				 AND  warehouses.location_id   in (
																				SELECT
																					 locations.pk_id
																				FROM
																					 locations
																				WHERE
																					  locations.parent_id = in_loc
																			)
         AND   stakeholders.geo_level_id=c_level
   UNION 
SELECT sum( hf_data_master.issue_balance) as issue_balance
   
        FROM warehouses
         Inner Join  hf_data_master  ON  warehouses.pk_id  =   hf_data_master.warehouse_id 
				 Inner Join  stakeholders ON  warehouses.stakeholder_office_id =   stakeholders.pk_id
         WHERE  hf_data_master.item_pack_size_id = in_item 
				 AND MONTH(hf_data_master.reporting_start_date) = in_month AND YEAR(hf_data_master.reporting_start_date) = in_year
				 AND  warehouses.pk_id  =   hf_data_master.warehouse_id  
				 AND  warehouses.location_id   in (
																				SELECT
																					 locations.pk_id
																				FROM
																					 locations
																				WHERE
																					  locations.parent_id = in_loc
																			)
         AND   stakeholders.geo_level_id=c_level) A  ;

WHEN (in_loc_level  = 'U') THEN
/*Aggreate Consumption for selected province*/
   SELECT sum(issue_balance) INTO retval FROM
(SELECT sum( warehouses_data.issue_balance) as issue_balance
          
        FROM warehouses
         Inner Join  warehouses_data  ON  warehouses.pk_id  =   warehouses_data.warehouse_id 
				 Inner Join  stakeholders  ON  warehouses.stakeholder_office_id =   stakeholders.pk_id
         WHERE  warehouses_data.item_pack_size_id = in_item 
				 AND MONTH(warehouses_data.reporting_start_date) = in_month AND YEAR(warehouses_data.reporting_start_date) = in_year
				 AND  warehouses.pk_id  =   warehouses_data.warehouse_id  
				 AND  warehouses.location_id   = in_loc
         AND   stakeholders.geo_level_id=c_level
  UNION 
 SELECT sum( hf_data_master.issue_balance) as issue_balance
         
        FROM warehouses
         Inner Join  hf_data_master  ON  warehouses.pk_id  =   hf_data_master.warehouse_id 
				 Inner Join  stakeholders  ON  warehouses.stakeholder_office_id =   stakeholders.pk_id
         WHERE  hf_data_master.item_pack_size_id = in_item 
				 AND MONTH(hf_data_master.reporting_start_date) = in_month AND YEAR(hf_data_master.reporting_start_date) = in_year
				 AND  warehouses.pk_id  =   hf_data_master.warehouse_id  
				 AND  warehouses.location_id   = in_loc
         AND   stakeholders.geo_level_id=c_level) A;

WHEN (in_loc_level  = 'UW') THEN
/*Aggreate Consumption for selected province*/
   SELECT sum(issue_balance) INTO retval FROM
(SELECT sum( warehouses_data.issue_balance) as issue_balance
        
        FROM warehouses
         Inner Join  warehouses_data  ON  warehouses.pk_id  =   warehouses_data.warehouse_id 
				 Inner Join  stakeholders ON  warehouses.stakeholder_office_id =   stakeholders.pk_id
         WHERE  warehouses_data.item_pack_size_id = in_item 
				 AND MONTH(warehouses_data.reporting_start_date) = in_month AND YEAR(warehouses_data.reporting_start_date) = in_year
				 AND  warehouses.pk_id  = in_loc 
         AND   stakeholders.geo_level_id=c_level
UNION 
 SELECT sum( hf_data_master.issue_balance) as issue_balance
      
        FROM warehouses
         Inner Join  hf_data_master  ON  warehouses.pk_id  =   hf_data_master.warehouse_id 
				 Inner Join  stakeholders ON  warehouses.stakeholder_office_id =   stakeholders.pk_id
         WHERE  hf_data_master.item_pack_size_id = in_item 
				 AND MONTH(hf_data_master.reporting_start_date) = in_month AND YEAR(hf_data_master.reporting_start_date) = in_year
				 AND  warehouses.pk_id  = in_loc 
         AND   stakeholders.geo_level_id=c_level) A;
 ELSE 
		BEGIN 

		END;
 END CASE;

SET retval = ROUND(retval,0);
 return retval;


END
;;
DELIMITER ;

-- ----------------------------
-- Function structure for REPgetConsumptionAVG
-- ----------------------------
DROP FUNCTION IF EXISTS `REPgetConsumptionAVG`;
DELIMITER ;;
CREATE DEFINER=`vlmis`@`%` FUNCTION `REPgetConsumptionAVG`(`in_type` varchar(8),`in_month` int,`in_year` int,`in_item` varchar(20),`in_stk` varchar(255),`in_prov` int,`in_dist` varchar(8)) RETURNS double
    DETERMINISTIC
BEGIN


  DECLARE retval DOUBLE DEFAULT 0;
  DECLARE lmt INTEGER;

-- INSERT INTO testing(tmp) VALUES('out side');

 SET lmt = UTILgetLimitParam(in_month,in_year);

IF lmt > 2 THEN
	SET lmt = 3;
ELSEIF lmt < 1 THEN
	SET lmt = 1;
END IF;
 -- Declare the cursor
 
-- INSERT INTO testing(tmp) VALUES('after uti');

  CASE

  WHEN (in_type = 'N') THEN
-- National field total, given month, year and product, includes all  stakeholders and all districts 
-- INSERT INTO testing(tmp) VALUES('inside N');

	SELECT AVG(csum) INTO retval FROM (
	SELECT Reporting_start_date, csum FROM (
			SELECT  Reporting_start_date,sum( warehouses_data.issue_balance) As csum
        FROM warehouses
         Inner Join  warehouses_data  ON  warehouses.pk_id  =   warehouses_data.warehouse_id 
				 Inner Join  stakeholders ON  warehouses.stakeholder_office_id =   stakeholders.pk_id
         WHERE  warehouses_data.item_pack_size_id = in_item and   stakeholders.geo_level_id=6
         GROUP BY Reporting_start_date
         UNION
         SELECT  Reporting_start_date,sum( hf_data_master.issue_balance) As csum
         FROM warehouses
         Inner Join  hf_data_master  ON  warehouses.pk_id  =   hf_data_master.warehouse_id 
				 Inner Join  stakeholders ON  warehouses.stakeholder_office_id =   stakeholders.pk_id
         WHERE  hf_data_master.item_pack_size_id = in_item and   stakeholders.geo_level_id=6
         GROUP BY Reporting_start_date 
			) As A
		WHERE csum > 0
		AND Reporting_start_date <= CONCAT(in_year,CONCAT('-',in_month),'-1')
		ORDER BY Reporting_start_date DESC
		LIMIT lmt
	) As B;

 WHEN (in_type = 'NW') THEN
-- National field total, given month, year and product, includes all  stakeholders and all districts 
-- INSERT INTO testing(tmp) VALUES('inside N');

	SELECT AVG(csum) INTO retval FROM (
	SELECT Reporting_start_date, csum FROM (
			SELECT  Reporting_start_date,sum( warehouses_data.issue_balance) As csum
        FROM warehouses
         Inner Join  warehouses_data  ON  warehouses.pk_id  =   warehouses_data.warehouse_id 
				 Inner Join  stakeholders ON  warehouses.stakeholder_office_id =   stakeholders.pk_id
         WHERE  warehouses_data.item_pack_size_id = in_item and   stakeholders.geo_level_id=6
         GROUP BY Reporting_start_date
       UNION
       SELECT  Reporting_start_date,sum( hf_data_master.issue_balance) As csum
        FROM warehouses
         Inner Join  hf_data_master  ON  warehouses.pk_id  =   hf_data_master.warehouse_id 
				 Inner Join  stakeholders ON  warehouses.stakeholder_office_id =   stakeholders.pk_id
         WHERE  hf_data_master.item_pack_size_id = in_item and   stakeholders.geo_level_id=6
         GROUP BY Reporting_start_date
			) As A
		WHERE csum > 0
		AND Reporting_start_date <= CONCAT(in_year,CONCAT('-',in_month),'-1')
		ORDER BY Reporting_start_date DESC
		LIMIT lmt
	) As B;

  WHEN (in_type = 'P') THEN

	SELECT AVG(csum) INTO retval FROM (
	SELECT Reporting_start_date, csum FROM (
			SELECT  Reporting_start_date,sum( warehouses_data.issue_balance) As csum
        FROM warehouses
         Inner Join  warehouses_data  ON  warehouses.pk_id  =   warehouses_data.warehouse_id 
				 Inner Join  stakeholders ON  warehouses.stakeholder_office_id =   stakeholders.pk_id
         WHERE  warehouses_data.item_pack_size_id = in_item AND  warehouses.province_id = in_prov and   stakeholders.geo_level_id=6
         GROUP BY Reporting_start_date
         UNION
       SELECT  Reporting_start_date,sum( hf_data_master.issue_balance) As csum
        FROM warehouses
         Inner Join  hf_data_master  ON  warehouses.pk_id  =   hf_data_master.warehouse_id 
				 Inner Join  stakeholders ON  warehouses.stakeholder_office_id =   stakeholders.pk_id
         WHERE  hf_data_master.item_pack_size_id = in_item AND  warehouses.province_id = in_prov and   stakeholders.geo_level_id=6
         GROUP BY Reporting_start_date   
			) As A
		WHERE csum > 0
		AND Reporting_start_date <= CONCAT(in_year,CONCAT('-',in_month),'-1')
		ORDER BY Reporting_start_date DESC
		LIMIT lmt
	) As B;

  WHEN (in_type = 'PW') THEN

	SELECT AVG(csum) INTO retval FROM (
	SELECT Reporting_start_date, csum FROM (
			SELECT  Reporting_start_date,sum( warehouses_data.issue_balance) As csum
        FROM warehouses
         Inner Join  warehouses_data  ON  warehouses.pk_id  =   warehouses_data.warehouse_id 
				 Inner Join  stakeholders ON  warehouses.stakeholder_office_id =   stakeholders.pk_id
         WHERE  warehouses_data.item_pack_size_id = in_item AND  warehouses.province_id = in_prov and   stakeholders.geo_level_id=6
         GROUP BY Reporting_start_date
         UNION
         SELECT  Reporting_start_date,sum( hf_data_master.issue_balance) As csum
         FROM warehouses
         Inner Join  hf_data_master  ON  warehouses.pk_id  =   hf_data_master.warehouse_id 
				 Inner Join  stakeholders ON  warehouses.stakeholder_office_id =   stakeholders.pk_id
         WHERE  hf_data_master.item_pack_size_id = in_item AND  warehouses.province_id = in_prov and   stakeholders.geo_level_id=6
         GROUP BY Reporting_start_date 
			) As A
		WHERE csum > 0
		AND Reporting_start_date <= CONCAT(in_year,CONCAT('-',in_month),'-1')
		ORDER BY Reporting_start_date DESC
		LIMIT lmt
	) As B;

WHEN (in_type = 'UP') THEN

	SELECT AVG(csum) INTO retval FROM (
	SELECT Reporting_start_date, csum FROM (
			SELECT  Reporting_start_date,sum( warehouses_data.issue_balance) As csum
        FROM warehouses
         Inner Join  warehouses_data  ON  warehouses.pk_id  =   warehouses_data.warehouse_id 
				 Inner Join  stakeholders ON  warehouses.stakeholder_office_id =   stakeholders.pk_id
         WHERE  warehouses_data.item_pack_size_id = in_item AND  warehouses.province_id = in_prov and   stakeholders.geo_level_id=6
         GROUP BY Reporting_start_date
         UNION
       SELECT  Reporting_start_date,sum( hf_data_master.issue_balance) As csum
        FROM warehouses
         Inner Join  hf_data_master  ON  warehouses.pk_id  =   hf_data_master.warehouse_id 
				 Inner Join  stakeholders ON  warehouses.stakeholder_office_id =   stakeholders.pk_id
         WHERE  hf_data_master.item_pack_size_id = in_item AND  warehouses.province_id = in_prov and   stakeholders.geo_level_id=6
         GROUP BY Reporting_start_date
			) As A
		WHERE csum > 0
		AND Reporting_start_date <= CONCAT(in_year,CONCAT('-',in_month),'-1')
		ORDER BY Reporting_start_date DESC
		LIMIT lmt
	) As B;

WHEN (in_type = 'V' ) THEN
-- field total, given  stakeholders, province, month, year and product, all districts
SELECT AVG(csum) INTO retval FROM (
	SELECT Reporting_start_date, csum FROM (
			SELECT  Reporting_start_date,sum( warehouses_data.issue_balance) As csum
        FROM warehouses
         Inner Join  warehouses_data  ON  warehouses.pk_id  =   warehouses_data.warehouse_id 
				 Inner Join  stakeholders ON  warehouses.stakeholder_office_id =   stakeholders.pk_id
         WHERE  warehouses_data.item_pack_size_id = in_item AND  warehouses.district_id in (SELECT
																					 locations.pk_id
																				FROM
																					 locations
																				WHERE
																					  locations.geo_level_id = 4
																				AND   locations.parent_id = in_prov) and   stakeholders.geo_level_id=6
         GROUP BY Reporting_start_date
        UNION
			   SELECT  Reporting_start_date,sum( hf_data_master.issue_balance) As csum
         FROM warehouses
         Inner Join  hf_data_master  ON  warehouses.pk_id  =   hf_data_master.warehouse_id 
				 Inner Join  stakeholders ON  warehouses.stakeholder_office_id =   stakeholders.pk_id
         WHERE  hf_data_master.item_pack_size_id = in_item AND  warehouses.district_id in (SELECT
																					 locations.pk_id
																				FROM
																					 locations
																				WHERE
																					  locations.geo_level_id = 4
																				AND   locations.parent_id = in_prov) and   stakeholders.geo_level_id=6
         GROUP BY Reporting_start_date  
			) As A
		WHERE csum > 0
		AND Reporting_start_date <= CONCAT(in_year,CONCAT('-',in_month),'-1')
		ORDER BY Reporting_start_date DESC
		LIMIT lmt
	) As B;

WHEN (in_type = 'D' ) THEN
-- field total, given  stakeholders, province, month, year and product, all districts
SELECT AVG(csum) INTO retval FROM (
	SELECT Reporting_start_date, csum FROM (
			SELECT  Reporting_start_date,sum( warehouses_data.issue_balance) As csum
        FROM warehouses
         Inner Join  warehouses_data  ON  warehouses.pk_id  =   warehouses_data.warehouse_id 
				 Inner Join  stakeholders ON  warehouses.stakeholder_office_id =   stakeholders.pk_id
         WHERE  warehouses_data.item_pack_size_id = in_item AND  warehouses.district_id = in_prov and   stakeholders.geo_level_id=6
         GROUP BY Reporting_start_date
        UNION
       SELECT  Reporting_start_date,sum( hf_data_master.issue_balance) As csum
        FROM warehouses
         Inner Join  hf_data_master  ON  warehouses.pk_id  =   hf_data_master.warehouse_id 
				 Inner Join  stakeholders ON  warehouses.stakeholder_office_id =   stakeholders.pk_id
         WHERE  hf_data_master.item_pack_size_id = in_item AND  warehouses.district_id = in_prov and   stakeholders.geo_level_id=6
         GROUP BY Reporting_start_date
			) As A
		WHERE csum > 0
		AND Reporting_start_date <= CONCAT(in_year,CONCAT('-',in_month),'-1')
		ORDER BY Reporting_start_date DESC
		LIMIT lmt
	) As B;

WHEN (in_type = 'DW') THEN
-- field total, given  stakeholders, province, month, year and product, all districts
SELECT AVG(csum) INTO retval FROM (
	SELECT Reporting_start_date, csum FROM (
			SELECT  Reporting_start_date,sum( warehouses_data.issue_balance) As csum
        FROM warehouses
         Inner Join  warehouses_data  ON  warehouses.pk_id  =   warehouses_data.warehouse_id 
				 Inner Join  stakeholders ON  warehouses.stakeholder_office_id =   stakeholders.pk_id
         WHERE  warehouses_data.item_pack_size_id = in_item AND  warehouses.district_id = in_prov and   stakeholders.geo_level_id=6
         GROUP BY Reporting_start_date
         UNION
         SELECT  Reporting_start_date,sum( hf_data_master.issue_balance) As csum
         FROM warehouses
         Inner Join  hf_data_master  ON  warehouses.pk_id  =   hf_data_master.warehouse_id 
				 Inner Join  stakeholders ON  warehouses.stakeholder_office_id =   stakeholders.pk_id
         WHERE  hf_data_master.item_pack_size_id = in_item AND  warehouses.district_id = in_prov and   stakeholders.geo_level_id=6
         GROUP BY Reporting_start_date
			) As A
		WHERE csum > 0
		AND Reporting_start_date <= CONCAT(in_year,CONCAT('-',in_month),'-1')
		ORDER BY Reporting_start_date DESC
		LIMIT lmt
	) As B;

WHEN (in_type = 'DU') THEN
-- field total, given  stakeholders, province, month, year and product, all districts
SELECT AVG(csum) INTO retval FROM (
	SELECT Reporting_start_date, csum FROM (
			SELECT  Reporting_start_date,sum( warehouses_data.issue_balance) As csum
        FROM warehouses
         Inner Join  warehouses_data  ON  warehouses.pk_id  =   warehouses_data.warehouse_id 
				 Inner Join  stakeholders ON  warehouses.stakeholder_office_id =   stakeholders.pk_id
         WHERE  warehouses_data.item_pack_size_id = in_item AND  warehouses.district_id = in_prov and   stakeholders.geo_level_id=6
         GROUP BY Reporting_start_date
         UNION
         SELECT  Reporting_start_date,sum( hf_data_master.issue_balance) As csum
         FROM warehouses
         Inner Join  hf_data_master  ON  warehouses.pk_id  =   hf_data_master.warehouse_id 
				 Inner Join  stakeholders ON  warehouses.stakeholder_office_id =   stakeholders.pk_id
         WHERE  hf_data_master.item_pack_size_id = in_item AND  warehouses.district_id = in_prov and   stakeholders.geo_level_id=6
         GROUP BY Reporting_start_date
			) As A
		WHERE csum > 0
		AND Reporting_start_date <= CONCAT(in_year,CONCAT('-',in_month),'-1')
		ORDER BY Reporting_start_date DESC
		LIMIT lmt
	) As B;

WHEN (in_type = 'DP') THEN
-- field total, given  stakeholders, province, month, year and product, all districts
SELECT AVG(csum) INTO retval FROM (
	SELECT Reporting_start_date, csum FROM (
			SELECT  Reporting_start_date,sum( warehouses_data.issue_balance) As csum
        FROM warehouses
         Inner Join  warehouses_data  ON  warehouses.pk_id  =   warehouses_data.warehouse_id 
				 Inner Join  stakeholders ON  warehouses.stakeholder_office_id =   stakeholders.pk_id
         WHERE  warehouses_data.item_pack_size_id = in_item AND  warehouses.province_id = in_prov and   stakeholders.geo_level_id=6
         GROUP BY Reporting_start_date
         UNION
         SELECT  Reporting_start_date,sum( hf_data_master.issue_balance) As csum
         FROM warehouses
         Inner Join  hf_data_master  ON  warehouses.pk_id  =   hf_data_master.warehouse_id 
				 Inner Join  stakeholders ON  warehouses.stakeholder_office_id =   stakeholders.pk_id
         WHERE  hf_data_master.item_pack_size_id = in_item AND  warehouses.province_id = in_prov and   stakeholders.geo_level_id=6
         GROUP BY Reporting_start_date
			) As A
		WHERE csum > 0
		AND Reporting_start_date <= CONCAT(in_year,CONCAT('-',in_month),'-1')
		ORDER BY Reporting_start_date DESC
		LIMIT lmt
	) As B;

WHEN (in_type = 'H' ) THEN
-- field total, given  stakeholders, province, month, year and product, all districts
SELECT AVG(csum) INTO retval FROM (
	SELECT Reporting_start_date, csum FROM (
			SELECT  Reporting_start_date,sum( warehouses_data.issue_balance) As csum
        FROM warehouses
         Inner Join  warehouses_data  ON  warehouses.pk_id  =   warehouses_data.warehouse_id 
				 Inner Join  stakeholders ON  warehouses.stakeholder_office_id =   stakeholders.pk_id
         WHERE  warehouses_data.item_pack_size_id = in_item AND  warehouses.location_id   in (
																				SELECT
																					 locations.pk_id
																				FROM
																					 locations
																				WHERE
																					  locations.parent_id = in_prov) 
								and   stakeholders.geo_level_id=6
         GROUP BY Reporting_start_date
UNION
SELECT  Reporting_start_date,sum( hf_data_master.issue_balance) As csum
        FROM warehouses
         Inner Join  hf_data_master  ON  warehouses.pk_id  =   hf_data_master.warehouse_id 
				 Inner Join  stakeholders ON  warehouses.stakeholder_office_id =   stakeholders.pk_id
         WHERE  hf_data_master.item_pack_size_id = in_item AND  warehouses.location_id   in (
																				SELECT
																					 locations.pk_id
																				FROM
																					 locations
																				WHERE
																					  locations.parent_id = in_prov) 
								and   stakeholders.geo_level_id=6
         GROUP BY Reporting_start_date
       
			) As A
		WHERE csum > 0
		AND Reporting_start_date <= CONCAT(in_year,CONCAT('-',in_month),'-1')
		ORDER BY Reporting_start_date DESC
		LIMIT lmt
	) As B;

WHEN (in_type = 'U' ) THEN
-- field total, given  stakeholders, province, month, year and product, all districts
SELECT AVG(csum) INTO retval FROM (
	SELECT Reporting_start_date, csum FROM (
			SELECT  Reporting_start_date,sum( warehouses_data.issue_balance) As csum
        FROM warehouses
         Inner Join  warehouses_data  ON  warehouses.pk_id  =   warehouses_data.warehouse_id 
				 Inner Join  stakeholders ON  warehouses.stakeholder_office_id =   stakeholders.pk_id
         WHERE  warehouses_data.item_pack_size_id = in_item AND  warehouses.location_id   = in_prov and   stakeholders.geo_level_id=6
         GROUP BY Reporting_start_date
UNION
      SELECT  Reporting_start_date,sum( hf_data_master.issue_balance) As csum
        FROM warehouses
         Inner Join  hf_data_master  ON  warehouses.pk_id  =   hf_data_master.warehouse_id 
				 Inner Join  stakeholders ON  warehouses.stakeholder_office_id =   stakeholders.pk_id
         WHERE  hf_data_master.item_pack_size_id = in_item AND  warehouses.location_id   = in_prov and   stakeholders.geo_level_id=6
         GROUP BY Reporting_start_date
			) As A
		WHERE csum > 0
		AND Reporting_start_date <= CONCAT(in_year,CONCAT('-',in_month),'-1')
		ORDER BY Reporting_start_date DESC
		LIMIT lmt
	) As B;



WHEN (in_type = 'UW' ) THEN
-- field total, given  stakeholders, province, month, year and product, all districts
SELECT AVG(csum) INTO retval FROM (
	SELECT Reporting_start_date, csum FROM (
			SELECT  Reporting_start_date,sum( warehouses_data.issue_balance) As csum
        FROM warehouses
         Inner Join  warehouses_data  ON  warehouses.pk_id  =   warehouses_data.warehouse_id 
				 Inner Join  stakeholders ON  warehouses.stakeholder_office_id =   stakeholders.pk_id
         WHERE  warehouses_data.item_pack_size_id = in_item AND  warehouses.pk_id  = in_prov and   stakeholders.geo_level_id=6
         GROUP BY Reporting_start_date
      UNION
     SELECT  Reporting_start_date,sum( hf_data_master.issue_balance) As csum
        FROM warehouses
         Inner Join  hf_data_master  ON  warehouses.pk_id  =   hf_data_master.warehouse_id 
				 Inner Join  stakeholders ON  warehouses.stakeholder_office_id =   stakeholders.pk_id
         WHERE  hf_data_master.item_pack_size_id = in_item AND  warehouses.pk_id  = in_prov and   stakeholders.geo_level_id=6
         GROUP BY Reporting_start_date
			) As A
		WHERE csum > 0
		AND Reporting_start_date <= CONCAT(in_year,CONCAT('-',in_month),'-1')
		ORDER BY Reporting_start_date DESC
		LIMIT lmt
	) As B;

 END CASE; 

 -- SET retval = IFNULL(retval,0);
 return retval;


END
;;
DELIMITER ;

-- ----------------------------
-- Function structure for REPgetConsumptionAVGMap
-- ----------------------------
DROP FUNCTION IF EXISTS `REPgetConsumptionAVGMap`;
DELIMITER ;;
CREATE DEFINER=`vlmis`@`%` FUNCTION `REPgetConsumptionAVGMap`(`in_type` varchar(8),`in_month` int,`in_year` int,`in_item` varchar(20),`in_stk` varchar(255),`in_prov` int,`in_dist` varchar(8)) RETURNS double
    DETERMINISTIC
BEGIN


  DECLARE retval DOUBLE DEFAULT 0;
  DECLARE lmt INTEGER;

-- INSERT INTO testing(tmp) VALUES('out side');

 SET lmt = UTILgetLimitParam(in_month,in_year);

IF lmt > 2 THEN
	SET lmt = 3;
ELSEIF lmt < 1 THEN
	SET lmt = 1;
END IF;
 -- Declare the cursor
 
-- INSERT INTO testing(tmp) VALUES('after uti');

  CASE

  WHEN (in_type = 'N') THEN
-- National field total, given month, year and product, includes all  stakeholders and all districts 
-- INSERT INTO testing(tmp) VALUES('inside N');

	SELECT AVG(csum) INTO retval FROM (
	SELECT Reporting_start_date, csum FROM (
			SELECT  Reporting_start_date,sum( warehouses_data.issue_balance) As csum
        FROM warehouses
         Inner Join  warehouses_data  ON  warehouses.pk_id  =   warehouses_data.warehouse_id 
				 Inner Join  stakeholders ON  warehouses.stakeholder_office_id =   stakeholders.pk_id
         WHERE  warehouses_data .item_pack_size_id = in_item and   stakeholders.geo_level_id=6
         GROUP BY Reporting_start_date
			) As A
		WHERE csum > 0
		AND Reporting_start_date <= CONCAT(in_year,CONCAT('-',in_month),'-1')
		ORDER BY Reporting_start_date DESC
		LIMIT lmt
	) As B;

 WHEN (in_type = 'NW') THEN
-- National field total, given month, year and product, includes all  stakeholders and all districts 
-- INSERT INTO testing(tmp) VALUES('inside N');

	SELECT AVG(csum) INTO retval FROM (
	SELECT Reporting_start_date, csum FROM (
			SELECT  Reporting_start_date,sum( warehouses_data.issue_balance) As csum
        FROM warehouses
         Inner Join  warehouses_data  ON  warehouses.pk_id  =   warehouses_data.warehouse_id 
				 Inner Join  stakeholders ON  warehouses.stakeholder_office_id =   stakeholders.pk_id
         WHERE  warehouses_data .item_pack_size_id = in_item and   stakeholders.geo_level_id=6
         GROUP BY Reporting_start_date
			) As A
		WHERE csum > 0
		AND Reporting_start_date <= CONCAT(in_year,CONCAT('-',in_month),'-1')
		ORDER BY Reporting_start_date DESC
		LIMIT lmt
	) As B;

  WHEN (in_type = 'P') THEN

	SELECT AVG(csum) INTO retval FROM (
	SELECT Reporting_start_date, csum FROM (
			SELECT  Reporting_start_date,sum( warehouses_data.issue_balance) As csum
        FROM warehouses
         Inner Join  warehouses_data  ON  warehouses.pk_id  =   warehouses_data.warehouse_id 
				 Inner Join  stakeholders ON  warehouses.stakeholder_office_id =   stakeholders.pk_id
         WHERE  warehouses_data .item_pack_size_id = in_item AND  warehouses.province_id = in_prov and   stakeholders.geo_level_id=6
         GROUP BY Reporting_start_date
			) As A
		WHERE csum > 0
		AND Reporting_start_date <= CONCAT(in_year,CONCAT('-',in_month),'-1')
		ORDER BY Reporting_start_date DESC
		LIMIT lmt
	) As B;

  WHEN (in_type = 'PW') THEN

	SELECT AVG(csum) INTO retval FROM (
	SELECT Reporting_start_date, csum FROM (
			SELECT  Reporting_start_date,sum( warehouses_data.issue_balance) As csum
        FROM warehouses
         Inner Join  warehouses_data  ON  warehouses.pk_id  =   warehouses_data.warehouse_id 
				 Inner Join  stakeholders ON  warehouses.stakeholder_office_id =   stakeholders.pk_id
         WHERE  warehouses_data .item_pack_size_id = in_item AND  warehouses.province_id = in_prov and   stakeholders.geo_level_id=6
         GROUP BY Reporting_start_date
			) As A
		WHERE csum > 0
		AND Reporting_start_date <= CONCAT(in_year,CONCAT('-',in_month),'-1')
		ORDER BY Reporting_start_date DESC
		LIMIT lmt
	) As B;

WHEN (in_type = 'UP') THEN

	SELECT AVG(csum) INTO retval FROM (
	SELECT Reporting_start_date, csum FROM (
			SELECT  Reporting_start_date,sum( warehouses_data.issue_balance) As csum
        FROM warehouses
         Inner Join  warehouses_data  ON  warehouses.pk_id  =   warehouses_data.warehouse_id 
				 Inner Join  stakeholders ON  warehouses.stakeholder_office_id =   stakeholders.pk_id
         WHERE  warehouses_data .item_pack_size_id = in_item AND  warehouses.province_id = in_prov and   stakeholders.geo_level_id=6
         GROUP BY Reporting_start_date
			) As A
		WHERE csum > 0
		AND Reporting_start_date <= CONCAT(in_year,CONCAT('-',in_month),'-1')
		ORDER BY Reporting_start_date DESC
		LIMIT lmt
	) As B;

WHEN (in_type = 'V' ) THEN
-- field total, given  stakeholders, province, month, year and product, all districts
SELECT AVG(csum) INTO retval FROM (
	SELECT Reporting_start_date, csum FROM (
			SELECT  Reporting_start_date,sum( warehouses_data.issue_balance) As csum
        FROM warehouses
         Inner Join  warehouses_data  ON  warehouses.pk_id  =   warehouses_data.warehouse_id 
				 Inner Join  stakeholders ON  warehouses.stakeholder_office_id =   stakeholders.pk_id
         WHERE  warehouses_data .item_pack_size_id = in_item AND  warehouses.district_id in (SELECT
																					 locations.pk_id
																				FROM
																					 locations
																				WHERE
																					  locations.geo_level_id = 4
																				AND   locations.parent_id = in_prov) and   stakeholders.geo_level_id=6
         GROUP BY Reporting_start_date
			) As A
		WHERE csum > 0
		AND Reporting_start_date <= CONCAT(in_year,CONCAT('-',in_month),'-1')
		ORDER BY Reporting_start_date DESC
		LIMIT lmt
	) As B;

WHEN (in_type = 'D' ) THEN
-- field total, given  stakeholders, province, month, year and product, all districts
SELECT AVG(csum) INTO retval FROM (
	SELECT Reporting_start_date, csum FROM (
			SELECT  Reporting_start_date,sum( warehouses_data.issue_balance) As csum
        FROM warehouses
         Inner Join  warehouses_data  ON  warehouses.pk_id  =   warehouses_data.warehouse_id 
				 Inner Join  stakeholders ON  warehouses.stakeholder_office_id =   stakeholders.pk_id
         WHERE  warehouses_data .item_pack_size_id = in_item AND  warehouses.district_id = in_prov and   stakeholders.geo_level_id=6
         GROUP BY Reporting_start_date
			) As A
		WHERE csum > 0
		AND Reporting_start_date <= CONCAT(in_year,CONCAT('-',in_month),'-1')
		ORDER BY Reporting_start_date DESC
		LIMIT lmt
	) As B;

WHEN (in_type = 'DW' ) THEN
-- field total, given  stakeholders, province, month, year and product, all districts
SELECT AVG(csum) INTO retval FROM (
	SELECT Reporting_start_date, csum FROM (
			SELECT  Reporting_start_date,sum( warehouses_data.issue_balance) As csum
        FROM warehouses
         Inner Join  warehouses_data  ON  warehouses.pk_id  =   warehouses_data.warehouse_id 
				 Inner Join  stakeholders ON  warehouses.stakeholder_office_id =   stakeholders.pk_id
         WHERE  warehouses_data .item_pack_size_id = in_item AND  warehouses.district_id = in_prov and   stakeholders.geo_level_id=6
         GROUP BY Reporting_start_date
			) As A
		WHERE csum > 0
		AND Reporting_start_date <= CONCAT(in_year,CONCAT('-',in_month),'-1')
		ORDER BY Reporting_start_date DESC
		LIMIT lmt
	) As B;

WHEN (in_type = 'DP' ) THEN
-- field total, given  stakeholders, province, month, year and product, all districts
SELECT AVG(csum) INTO retval FROM (
	SELECT Reporting_start_date, csum FROM (
			SELECT  Reporting_start_date,sum( warehouses_data.issue_balance) As csum
        FROM warehouses
         Inner Join  warehouses_data  ON  warehouses.pk_id  =   warehouses_data.warehouse_id 
				 Inner Join  stakeholders ON  warehouses.stakeholder_office_id =   stakeholders.pk_id
         WHERE  warehouses_data .item_pack_size_id = in_item AND  warehouses.province_id = in_prov and   stakeholders.geo_level_id=6
         GROUP BY Reporting_start_date
			) As A
		WHERE csum > 0
		AND Reporting_start_date <= CONCAT(in_year,CONCAT('-',in_month),'-1')
		ORDER BY Reporting_start_date DESC
		LIMIT lmt
	) As B;

WHEN (in_type = 'H' ) THEN
-- field total, given  stakeholders, province, month, year and product, all districts
SELECT AVG(csum) INTO retval FROM (
	SELECT Reporting_start_date, csum FROM (
			SELECT  Reporting_start_date,sum( warehouses_data.issue_balance) As csum
        FROM warehouses
         Inner Join  warehouses_data  ON  warehouses.pk_id  =   warehouses_data.warehouse_id 
				 Inner Join  stakeholders ON  warehouses.stakeholder_office_id =   stakeholders.pk_id
         WHERE  warehouses_data .item_pack_size_id = in_item AND  warehouses.location_id   in (
																				SELECT
																					 locations.pk_id
																				FROM
																					 locations
																				WHERE
																					  locations.parent_id = in_prov) 
								and   stakeholders.geo_level_id=6
         GROUP BY Reporting_start_date
			) As A
		WHERE csum > 0
		AND Reporting_start_date <= CONCAT(in_year,CONCAT('-',in_month),'-1')
		ORDER BY Reporting_start_date DESC
		LIMIT lmt
	) As B;

WHEN (in_type = 'U' ) THEN
-- field total, given  stakeholders, province, month, year and product, all districts
SELECT AVG(csum) INTO retval FROM (
	SELECT Reporting_start_date, csum FROM (
			SELECT  Reporting_start_date,sum( warehouses_data.issue_balance) As csum
        FROM warehouses
         Inner Join  warehouses_data  ON  warehouses.pk_id  =   warehouses_data.warehouse_id 
				 Inner Join  stakeholders ON  warehouses.stakeholder_office_id =   stakeholders.pk_id
         WHERE  warehouses_data .item_pack_size_id = in_item AND  warehouses.location_id   = in_prov and   stakeholders.geo_level_id=6
         GROUP BY Reporting_start_date
			) As A
		WHERE csum > 0
		AND Reporting_start_date <= CONCAT(in_year,CONCAT('-',in_month),'-1')
		ORDER BY Reporting_start_date DESC
		LIMIT lmt
	) As B;



WHEN (in_type = 'UW' ) THEN
-- field total, given  stakeholders, province, month, year and product, all districts
SELECT AVG(csum) INTO retval FROM (
	SELECT Reporting_start_date, csum FROM (
			SELECT  Reporting_start_date,sum( warehouses_data.issue_balance) As csum
        FROM warehouses
         Inner Join  warehouses_data  ON  warehouses.pk_id  =   warehouses_data.warehouse_id 
				 Inner Join  stakeholders ON  warehouses.stakeholder_office_id =   stakeholders.pk_id
         WHERE  warehouses_data .item_pack_size_id = in_item AND  warehouses.pk_id  = in_prov and   stakeholders.geo_level_id=6
         GROUP BY Reporting_start_date
			) As A
		WHERE csum > 0
		AND Reporting_start_date <= CONCAT(in_year,CONCAT('-',in_month),'-1')
		ORDER BY Reporting_start_date DESC
		LIMIT lmt
	) As B;

 END CASE; 

 -- SET retval = IFNULL(retval,0);
 return retval;


END
;;
DELIMITER ;

-- ----------------------------
-- Function structure for REPgetData
-- ----------------------------
DROP FUNCTION IF EXISTS `REPgetData`;
DELIMITER ;;
CREATE DEFINER=`vlmis`@`%` FUNCTION `REPgetData`(`in_col` varchar(255),`in_rg` varchar(1),`in_type` varchar(8),`in_month` int,`in_year` int,`in_item` int,`in_stk` int,`in_prov` int,`in_dist` varchar(8)) RETURNS varchar(255) CHARSET latin1
    DETERMINISTIC
BEGIN
/*
in_col
 C - Consumption
 A - Average Monthly Consumption
 B - Closing Balance
 M - Month of Stock
 Y - Couple Year Protection

in_type
 F - field
 W - warehouse
 T - total
 S -  stakeholders
 P - province
 D - district

in_rg;
 G - graph
 N - national
 S -  stakeholders
 P - Provincial
 D - district
 X - Private Group
*/


  DECLARE retstr VARCHAR(255);
  DECLARE tmp VARCHAR(255);

 /* report variables */
  DECLARE  c DOUBLE DEFAULT 0;
  DECLARE  a DOUBLE DEFAULT 0;
  DECLARE  b DOUBLE DEFAULT 0;
  DECLARE  m VARCHAR(8) DEFAULT '0';
  DECLARE  y DOUBLE DEFAULT 0;
  DECLARE  r DOUBLE DEFAULT 0;
  DECLARE  v DOUBLE DEFAULT 0;



 /* report variables */
  DECLARE  cf DOUBLE DEFAULT 0;
  DECLARE  ct DOUBLE DEFAULT 0;

  DECLARE  af DOUBLE DEFAULT 0;
  DECLARE  aw DOUBLE DEFAULT 0;

  DECLARE  bf DOUBLE DEFAULT 0;
  DECLARE  bw DOUBLE DEFAULT 0;

  DECLARE  mf DOUBLE DEFAULT 0;
  DECLARE  mw DOUBLE DEFAULT 0;

  DECLARE  yf DOUBLE DEFAULT 0;
  DECLARE  yw DOUBLE DEFAULT 0;


/* report variables */
  DECLARE  cflag DOUBLE DEFAULT 0;
  DECLARE  aflag DOUBLE DEFAULT 0;
  DECLARE  bflag DOUBLE DEFAULT 0;
  DECLARE  mflag DOUBLE DEFAULT 0;
  DECLARE  yflag DOUBLE DEFAULT 0;
  DECLARE  rflag DOUBLE DEFAULT 0;
  DECLARE  vflag DOUBLE DEFAULT 0;


/* warehouse, field flags*/
  DECLARE  fflag DOUBLE DEFAULT 0;
  DECLARE  wflag DOUBLE DEFAULT 0;
  DECLARE  tflag DOUBLE DEFAULT 0;

/* stakehoder, province, district flags*/
  DECLARE  sflag DOUBLE DEFAULT 0;
  DECLARE  pflag DOUBLE DEFAULT 0;
  DECLARE  dflag DOUBLE DEFAULT 0;
  DECLARE  lflag DOUBLE DEFAULT 0;


  DECLARE  ctotal DOUBLE DEFAULT 0;
  DECLARE  atotal DOUBLE DEFAULT 0;
  DECLARE  btotal DOUBLE DEFAULT 0;
  DECLARE  mtotal DOUBLE DEFAULT 0;
  DECLARE  ytotal DOUBLE DEFAULT 0;


  DECLARE  ccyp DOUBLE DEFAULT 0;
  DECLARE  dc VARCHAR(1) DEFAULT '*';
  DECLARE cypfactor FLOAT DEFAULT 0.0;


  DECLARE  total DOUBLE DEFAULT 0;
  DECLARE  val DOUBLE DEFAULT 0;

 -- Declare variables used just for cursor and loop control
  DECLARE no_more_rows BOOLEAN;
  DECLARE loop_cntr INT DEFAULT 0;
  DECLARE num_rows INT DEFAULT 0;
  DECLARE stkid_var INT DEFAULT 0;


-- Declare 'handlers' for exceptions
  DECLARE CONTINUE HANDLER FOR NOT FOUND
    SET no_more_rows = TRUE;

/* Consumtion, Average Monthly Consumption, Closing Blance, Months of Stock, CYP*/
IF INSTR(in_col,'C') > 0 THEN
 SET cflag = 1;
END IF;

IF INSTR(in_col,'A') > 0 THEN
 SET aflag = 1;
END IF;

IF INSTR(in_col,'B') > 0 THEN
 SET bflag = 1;
END IF;

IF INSTR(in_col,'M') > 0 THEN
 SET mflag = 1;
END IF;

IF INSTR(in_col,'Y') > 0 THEN
 SET yflag = 1;
END IF;

IF INSTR(in_col,'R') > 0 THEN
 SET rflag = 1;
END IF;

IF INSTR(in_col,'V') > 0 THEN
 SET vflag = 1;
END IF;



/* field, warehouse, total flags*/
IF INSTR(in_type,'F') > 0 THEN
 SET fflag = 1;
END IF;

IF INSTR(in_type,'W') > 0 THEN
 SET wflag = 1;
END IF;

IF INSTR(in_type,'T') > 0 THEN
 SET tflag = 1;
END IF;



/*  stakeholders, province, district flags, field flags*/
IF INSTR(in_type,'S') > 0 THEN
 SET sflag = 1;
END IF;

IF INSTR(in_type,'P') > 0 THEN
 SET pflag = 1;
END IF;

IF INSTR(in_type,'D') > 0 THEN
 SET dflag = 1;
END IF;

IF INSTR(in_type,'L') > 0 THEN
 SET lflag = 1;
END IF;

-- INSERT INTO testing(tmp) VALUES('outside c flag');
   IF  (cflag > 0) THEN
-- INSERT INTO testing(tmp) VALUES('inside c flag');
   -- caller requested consumption data 
   SELECT  REPgetConsumption(in_month, in_year, in_item, in_stk, in_type, in_prov) INTO c from DUAL;
   END IF;

-- INSERT INTO testing(tmp) VALUES('outside a flag');

  IF  (aflag > 0) THEN
 -- INSERT INTO testing(tmp) VALUES('inside aflag');
   -- caller request average monthly consumption  
    SELECT REPgetConsumptionAVG(in_type,in_month, in_year, in_item, in_stk, in_prov, in_dist) INTO a from DUAL;
  END IF;


  IF  (bflag > 0) THEN
   -- caller request closing balance  
    SELECT REPgetCB(in_type,in_month, in_year, in_item, in_stk, in_prov, in_dist) INTO b from DUAL;
  END IF;

  IF  (mflag > 0) THEN
   -- caller request months of stock  
    SELECT REPgetMOS(in_type,in_month, in_year, in_item, in_stk, in_prov, in_dist) INTO m from DUAL;
  IF ( m = 'UNK') THEN
 -- graph can not show UNK, convert it into 0
   IF (in_rg = 'G') THEN
    SET m = 0;
   END IF;
  END IF;

  END IF;
/*
  IF  (yflag > 0) THEN
   -- caller request couple year protection   
     SELECT REPgetCYP(in_type,in_month, in_year, in_item, in_stk, in_prov, in_dist) INTO y from DUAL;
  END IF;

-- Two new reports added Oct 01, 2010 mahmed 
  IF  (rflag > 0) THEN
   -- caller request reporting rate 
    SELECT   REPgetCYP(in_type,in_month, in_year, in_item, in_stk, in_prov, in_dist) INTO r from DUAL;
  END IF;

 IF  (vflag > 0) THEN
   -- caller request availability 
    SELECT REPgetCYP(in_type,in_month, in_year, in_item, in_stk, in_prov, in_dist) INTO r from DUAL;
  END IF;
 
*/
-- prepare data string 
  SET retstr = '';
  -- final value
  IF (in_rg = 'G') THEN

     SET tmp = IFNULL(c,0);
     SET retstr = CONCAT(retstr,tmp,dc);   

     SET tmp = IFNULL(a,0);
     SET retstr = CONCAT(retstr,tmp,dc); 

     SET tmp = IFNULL(b,0);
     SET retstr = CONCAT(retstr,tmp,dc); 

     SET tmp = IFNULL(m,0);
     SET retstr = CONCAT(retstr,tmp,dc); 

  ELSE

     SET tmp = IFNULL(c,'UNK');     
     SET retstr = CONCAT(retstr,tmp,dc);   

     SET tmp = IFNULL(a,'UNK');
     SET retstr = CONCAT(retstr,tmp,dc); 
 
     SET tmp = IFNULL(b,'UNK');
     SET retstr = CONCAT(retstr,tmp,dc); 
 
     SET tmp = IFNULL(m,'UNK');
     IF LENGTH(tmp) = 0 THEN
      SET tmp = 'UNK';
     END IF;
     SET retstr = CONCAT(retstr,tmp,dc); 
 
    SET tmp = IFNULL(y,'UNK');
    SET retstr = CONCAT(retstr,tmp);
 END IF;
 
  -- send requested data in delimited string
  -- SET retstr = CONCAT(c,dc,a,dc,b,dc,m,dc,y);

   RETURN(retstr);
END
;;
DELIMITER ;

-- ----------------------------
-- Function structure for REPgetMapConsumption
-- ----------------------------
DROP FUNCTION IF EXISTS `REPgetMapConsumption`;
DELIMITER ;;
CREATE DEFINER=`vlmis`@`192.168.1.232` FUNCTION `REPgetMapConsumption`(`in_month` int,`in_year` int,`in_item` int,`in_stk` int,`in_loc_level` varchar(8),`in_loc` int) RETURNS varchar(10) CHARSET latin1
    DETERMINISTIC
BEGIN

/* Written by Wasif Raza Mirza - Oct 13 */

DECLARE retval DOUBLE DEFAULT 0;

/* consumption is present on what level: in vLMIS it is on UC level which is 6th level*/
DECLARE c_level INTEGER DEFAULT 6; 

CASE 
WHEN (in_loc_level = 'N') THEN
  /*  Aggreate National Consumption */
   SELECT sum( warehouses_data.issue_balance)
          INTO retval
					FROM warehouses
         Inner Join  warehouses_data  ON  warehouses.pk_id  =   warehouses_data.warehouse_id 
				 Inner Join  stakeholders ON  warehouses.stakeholder_office_id =   stakeholders.pk_id
         WHERE  warehouses_data .item_pack_size_id = in_item
         AND  warehouses.pk_id  =   warehouses_data.warehouse_id  
         AND MONTH(warehouses_data.reporting_start_date) = in_month 
         AND YEAR(warehouses_data.reporting_start_date) = in_year
         AND   stakeholders.geo_level_id=c_level;

WHEN (in_loc_level  = 'P') THEN
/*Aggreate Consumption for selected province*/
   SELECT sum( warehouses_data.issue_balance)
          INTO retval
        FROM warehouses
         Inner Join  warehouses_data  ON  warehouses.pk_id  =   warehouses_data.warehouse_id 
				 Inner Join  stakeholders ON  warehouses.stakeholder_office_id =   stakeholders.pk_id
         WHERE  warehouses_data .item_pack_size_id = in_item 
				 AND MONTH(warehouses_data.reporting_start_date) = in_month AND YEAR(warehouses_data.reporting_start_date) = in_year
         AND  warehouses.province_id = in_loc
         AND   stakeholders.geo_level_id=c_level;

WHEN (in_loc_level  = 'UP') THEN
/*Aggreate Consumption for selected province*/
   SELECT sum( warehouses_data.issue_balance)
          INTO retval
        FROM warehouses
         Inner Join  warehouses_data  ON  warehouses.pk_id  =   warehouses_data.warehouse_id 
				 Inner Join  stakeholders ON  warehouses.stakeholder_office_id =   stakeholders.pk_id
         WHERE  warehouses_data .item_pack_size_id = in_item 
				 AND MONTH(warehouses_data.reporting_start_date) = in_month AND YEAR(warehouses_data.reporting_start_date) = in_year
         AND  warehouses.province_id = in_loc
         AND   stakeholders.geo_level_id=c_level;

 WHEN (in_loc_level  = 'V') THEN
/*Aggreate Consumption for selected province*/
   SELECT sum( warehouses_data.issue_balance)
          INTO retval
        FROM warehouses
         Inner Join  warehouses_data  ON  warehouses.pk_id  =   warehouses_data.warehouse_id 
				 Inner Join  stakeholders ON  warehouses.stakeholder_office_id =   stakeholders.pk_id
         WHERE  warehouses_data .item_pack_size_id = in_item 
				 AND MONTH(warehouses_data.reporting_start_date) = in_month AND YEAR(warehouses_data.reporting_start_date) = in_year
				 AND  warehouses.pk_id  =   warehouses_data.warehouse_id  
				 AND  warehouses.district_id in (SELECT
																					 locations.pk_id
																				FROM
																					 locations
																				WHERE
																					  locations.geo_level_id = 4
																				AND   locations.parent_id = in_loc)
         AND   stakeholders.geo_level_id=c_level;


WHEN (in_loc_level  = 'D') THEN
/*Aggreate Consumption for selected province*/
   SELECT sum(warehouses_data.issue_balance)
          INTO retval
        FROM warehouses
         Inner Join  warehouses_data  ON  warehouses.pk_id  =   warehouses_data.warehouse_id 
				 Inner Join  stakeholders  ON  warehouses.stakeholder_office_id =   stakeholders.pk_id
         WHERE  warehouses_data .item_pack_size_id = in_item 
				 AND MONTH(warehouses_data.reporting_start_date) = in_month AND YEAR(warehouses_data.reporting_start_date) = in_year
				 AND  warehouses.pk_id  =   warehouses_data.warehouse_id  
				 AND  warehouses.district_id = in_loc
         AND   stakeholders.geo_level_id=c_level;

WHEN (in_loc_level  = 'DW') THEN
/*Aggreate Consumption for selected province*/
   SELECT sum( warehouses_data.issue_balance)
          INTO retval
        FROM warehouses
         Inner Join  warehouses_data  ON  warehouses.pk_id  =   warehouses_data.warehouse_id 
				 Inner Join  stakeholders  ON  warehouses.stakeholder_office_id =   stakeholders.pk_id
         WHERE  warehouses_data .item_pack_size_id = in_item 
				 AND MONTH(warehouses_data.reporting_start_date) = in_month AND YEAR(warehouses_data.reporting_start_date) = in_year
				 AND  warehouses.pk_id  =   warehouses_data.warehouse_id  
				 AND  warehouses.district_id = in_loc
         AND   stakeholders.geo_level_id=c_level;

WHEN (in_loc_level  = 'DP') THEN
/*Aggreate Consumption for selected province*/
   SELECT sum( warehouses_data.issue_balance)
          INTO retval
        FROM warehouses
         Inner Join  warehouses_data  ON  warehouses.pk_id  =   warehouses_data.warehouse_id 
				 Inner Join  stakeholders ON  warehouses.stakeholder_office_id =   stakeholders.pk_id
         WHERE  warehouses_data .item_pack_size_id = in_item 
				 AND MONTH(warehouses_data.reporting_start_date) = in_month AND YEAR(warehouses_data.reporting_start_date) = in_year
				 AND  warehouses.pk_id  =   warehouses_data.warehouse_id  
				 AND  warehouses.province_id = in_loc
         AND   stakeholders.geo_level_id=c_level;

 WHEN (in_loc_level  = 'H') THEN
/*Aggreate Consumption for selected province*/
   SELECT sum( warehouses_data.issue_balance)
          INTO retval
        FROM warehouses
         Inner Join  warehouses_data  ON  warehouses.pk_id  =   warehouses_data.warehouse_id 
				 Inner Join  stakeholders ON  warehouses.stakeholder_office_id =   stakeholders.pk_id
         WHERE  warehouses_data .item_pack_size_id = in_item 
				 AND MONTH(warehouses_data.reporting_start_date) = in_month AND YEAR(warehouses_data.reporting_start_date) = in_year
				 AND  warehouses.pk_id  =   warehouses_data.warehouse_id  
				 AND  warehouses.location_id   in (
																				SELECT
																					 locations.pk_id
																				FROM
																					 locations
																				WHERE
																					  locations.parent_id = in_loc
																			)
         AND   stakeholders.geo_level_id=c_level;

WHEN (in_loc_level  = 'U') THEN
/*Aggreate Consumption for selected province*/
   SELECT sum( warehouses_data.issue_balance)
          INTO retval
        FROM warehouses
         Inner Join  warehouses_data  ON  warehouses.pk_id  =   warehouses_data.warehouse_id 
				 Inner Join  stakeholders  ON  warehouses.stakeholder_office_id =   stakeholders.pk_id
         WHERE  warehouses_data .item_pack_size_id = in_item 
				 AND MONTH(warehouses_data.reporting_start_date) = in_month AND YEAR(warehouses_data.reporting_start_date) = in_year
				 AND  warehouses.pk_id  =   warehouses_data.warehouse_id  
				 AND  warehouses.location_id   = in_loc
         AND   stakeholders.geo_level_id=c_level;

WHEN (in_loc_level  = 'UW') THEN
/*Aggreate Consumption for selected province*/
   SELECT sum( warehouses_data.issue_balance)
          INTO retval
        FROM warehouses
         Inner Join  warehouses_data  ON  warehouses.pk_id  =   warehouses_data.warehouse_id 
				 Inner Join  stakeholders ON  warehouses.stakeholder_office_id =   stakeholders.pk_id
         WHERE  warehouses_data .item_pack_size_id = in_item 
				 AND MONTH(warehouses_data.reporting_start_date) = in_month AND YEAR(warehouses_data.reporting_start_date) = in_year
				 AND  warehouses.pk_id  = in_loc 
         AND   stakeholders.geo_level_id=c_level;
 ELSE 
		BEGIN 

		END;
 END CASE;

SET retval = ROUND(retval,0);
 return retval;


END
;;
DELIMITER ;

-- ----------------------------
-- Function structure for REPgetMapData
-- ----------------------------
DROP FUNCTION IF EXISTS `REPgetMapData`;
DELIMITER ;;
CREATE DEFINER=`vlmis`@`192.168.1.232` FUNCTION `REPgetMapData`(`in_col` varchar(255),`in_rg` varchar(1),`in_type` varchar(8),`in_month` int,`in_year` int,`in_item` int,`in_stk` int,`in_prov` int,`in_dist` varchar(8)) RETURNS varchar(255) CHARSET latin1
    DETERMINISTIC
BEGIN
/*
in_col
 C - Consumption
 A - Average Monthly Consumption
 B - Closing Balance
 M - Month of Stock
 Y - Couple Year Protection

in_type
 F - field
 W - warehouse
 T - total
 S -  stakeholders
 P - province
 D - district

in_rg;
 G - graph
 N - national
 S -  stakeholders
 P - Provincial
 D - district
 X - Private Group
*/


  DECLARE retstr VARCHAR(255);
  DECLARE tmp VARCHAR(255);

 /* report variables */
  DECLARE  c DOUBLE DEFAULT 0;
  DECLARE  a DOUBLE DEFAULT 0;
  DECLARE  b DOUBLE DEFAULT 0;
  DECLARE  m VARCHAR(8) DEFAULT '0';
  DECLARE  y DOUBLE DEFAULT 0;
  DECLARE  r DOUBLE DEFAULT 0;
  DECLARE  v DOUBLE DEFAULT 0;



 /* report variables */
  DECLARE  cf DOUBLE DEFAULT 0;
  DECLARE  ct DOUBLE DEFAULT 0;

  DECLARE  af DOUBLE DEFAULT 0;
  DECLARE  aw DOUBLE DEFAULT 0;

  DECLARE  bf DOUBLE DEFAULT 0;
  DECLARE  bw DOUBLE DEFAULT 0;

  DECLARE  mf DOUBLE DEFAULT 0;
  DECLARE  mw DOUBLE DEFAULT 0;

  DECLARE  yf DOUBLE DEFAULT 0;
  DECLARE  yw DOUBLE DEFAULT 0;


/* report variables */
  DECLARE  cflag DOUBLE DEFAULT 0;
  DECLARE  aflag DOUBLE DEFAULT 0;
  DECLARE  bflag DOUBLE DEFAULT 0;
  DECLARE  mflag DOUBLE DEFAULT 0;
  DECLARE  yflag DOUBLE DEFAULT 0;
  DECLARE  rflag DOUBLE DEFAULT 0;
  DECLARE  vflag DOUBLE DEFAULT 0;


/* warehouse, field flags*/
  DECLARE  fflag DOUBLE DEFAULT 0;
  DECLARE  wflag DOUBLE DEFAULT 0;
  DECLARE  tflag DOUBLE DEFAULT 0;

/* stakehoder, province, district flags*/
  DECLARE  sflag DOUBLE DEFAULT 0;
  DECLARE  pflag DOUBLE DEFAULT 0;
  DECLARE  dflag DOUBLE DEFAULT 0;
  DECLARE  lflag DOUBLE DEFAULT 0;


  DECLARE  ctotal DOUBLE DEFAULT 0;
  DECLARE  atotal DOUBLE DEFAULT 0;
  DECLARE  btotal DOUBLE DEFAULT 0;
  DECLARE  mtotal DOUBLE DEFAULT 0;
  DECLARE  ytotal DOUBLE DEFAULT 0;


  DECLARE  ccyp DOUBLE DEFAULT 0;
  DECLARE  dc VARCHAR(1) DEFAULT '*';
  DECLARE cypfactor FLOAT DEFAULT 0.0;


  DECLARE  total DOUBLE DEFAULT 0;
  DECLARE  val DOUBLE DEFAULT 0;

 -- Declare variables used just for cursor and loop control
  DECLARE no_more_rows BOOLEAN;
  DECLARE loop_cntr INT DEFAULT 0;
  DECLARE num_rows INT DEFAULT 0;
  DECLARE stkid_var INT DEFAULT 0;


-- Declare 'handlers' for exceptions
  DECLARE CONTINUE HANDLER FOR NOT FOUND
    SET no_more_rows = TRUE;

/* Consumtion, Average Monthly Consumption, Closing Blance, Months of Stock, CYP*/
IF INSTR(in_col,'C') > 0 THEN
 SET cflag = 1;
END IF;

IF INSTR(in_col,'A') > 0 THEN
 SET aflag = 1;
END IF;

IF INSTR(in_col,'B') > 0 THEN
 SET bflag = 1;
END IF;

IF INSTR(in_col,'M') > 0 THEN
 SET mflag = 1;
END IF;

IF INSTR(in_col,'Y') > 0 THEN
 SET yflag = 1;
END IF;

IF INSTR(in_col,'R') > 0 THEN
 SET rflag = 1;
END IF;

IF INSTR(in_col,'V') > 0 THEN
 SET vflag = 1;
END IF;



/* field, warehouse, total flags*/
IF INSTR(in_type,'F') > 0 THEN
 SET fflag = 1;
END IF;

IF INSTR(in_type,'W') > 0 THEN
 SET wflag = 1;
END IF;

IF INSTR(in_type,'T') > 0 THEN
 SET tflag = 1;
END IF;



/*  stakeholders, province, district flags, field flags*/
IF INSTR(in_type,'S') > 0 THEN
 SET sflag = 1;
END IF;

IF INSTR(in_type,'P') > 0 THEN
 SET pflag = 1;
END IF;

IF INSTR(in_type,'D') > 0 THEN
 SET dflag = 1;
END IF;

IF INSTR(in_type,'L') > 0 THEN
 SET lflag = 1;
END IF;

-- INSERT INTO testing(tmp) VALUES('outside c flag');
   IF  (cflag > 0) THEN
-- INSERT INTO testing(tmp) VALUES('inside c flag');
   -- caller requested consumption data 
   SELECT  REPgetConsumption(in_month, in_year, in_item, in_stk, in_type, in_prov) INTO c from DUAL;
   END IF;

-- INSERT INTO testing(tmp) VALUES('outside a flag');

  IF  (aflag > 0) THEN
 -- INSERT INTO testing(tmp) VALUES('inside aflag');
   -- caller request average monthly consumption  
    SELECT REPgetConsumptionAVG(in_type,in_month, in_year, in_item, in_stk, in_prov, in_dist) INTO a from DUAL;
  END IF;


  IF  (bflag > 0) THEN
   -- caller request closing balance  
    SELECT REPgetCB(in_type,in_month, in_year, in_item, in_stk, in_prov, in_dist) INTO b from DUAL;
  END IF;

  IF  (mflag > 0) THEN
   -- caller request months of stock  
    SELECT REPgetMOS(in_type,in_month, in_year, in_item, in_stk, in_prov, in_dist) INTO m from DUAL;
  IF ( m = 'UNK') THEN
 -- graph can not show UNK, convert it into 0
   IF (in_rg = 'G') THEN
    SET m = 0;
   END IF;
  END IF;

  END IF;
/*
  IF  (yflag > 0) THEN
   -- caller request couple year protection   
     SELECT REPgetCYP(in_type,in_month, in_year, in_item, in_stk, in_prov, in_dist) INTO y from DUAL;
  END IF;

-- Two new reports added Oct 01, 2010 mahmed 
  IF  (rflag > 0) THEN
   -- caller request reporting rate 
    SELECT   REPgetCYP(in_type,in_month, in_year, in_item, in_stk, in_prov, in_dist) INTO r from DUAL;
  END IF;

 IF  (vflag > 0) THEN
   -- caller request availability 
    SELECT REPgetCYP(in_type,in_month, in_year, in_item, in_stk, in_prov, in_dist) INTO r from DUAL;
  END IF;
 
*/
-- prepare data string 
  SET retstr = '';
  -- final value
  IF (in_rg = 'G') THEN

     SET tmp = IFNULL(c,0);
     SET retstr = CONCAT(retstr,tmp,dc);   

     SET tmp = IFNULL(a,0);
     SET retstr = CONCAT(retstr,tmp,dc); 

     SET tmp = IFNULL(b,0);
     SET retstr = CONCAT(retstr,tmp,dc); 

     SET tmp = IFNULL(m,0);
     SET retstr = CONCAT(retstr,tmp,dc); 

  ELSE

     SET tmp = IFNULL(c,'0');     
     SET retstr = CONCAT(retstr,tmp,dc);   

     SET tmp = IFNULL(a,'0');
     SET retstr = CONCAT(retstr,tmp,dc); 
 
     SET tmp = IFNULL(b,'0');
     SET retstr = CONCAT(retstr,tmp,dc); 
 
     SET tmp = IFNULL(m,'0');
     IF LENGTH(tmp) = 0 THEN
      SET tmp = '0';
     END IF;
     SET retstr = CONCAT(retstr,tmp,dc); 
 
    SET tmp = IFNULL(y,'0');
    SET retstr = CONCAT(retstr,tmp);
 END IF;
 
  -- send requested data in delimited string
  -- SET retstr = CONCAT(c,dc,a,dc,b,dc,m,dc,y);

   RETURN(retstr);
END
;;
DELIMITER ;

-- ----------------------------
-- Function structure for REPgetMOS
-- ----------------------------
DROP FUNCTION IF EXISTS `REPgetMOS`;
DELIMITER ;;
CREATE DEFINER=`vlmis`@`%` FUNCTION `REPgetMOS`(`in_type` varchar(8),`in_month` int,`in_year` int,`in_item` varchar(20),`in_stk` int,`in_prov` int,`in_dist` varchar(8)) RETURNS varchar(15) CHARSET latin1
    DETERMINISTIC
BEGIN

  DECLARE retval DOUBLE DEFAULT 0;
  DECLARE retval2 DOUBLE DEFAULT 0;
  DECLARE retstr VARCHAR(8) DEFAULT '';

    -- Declare '_val' variables to read in each record from the cursor
  DECLARE name_val VARCHAR(255);
  DECLARE status_update_val VARCHAR(255);

  -- Declare variables used just for cursor and loop control
  DECLARE no_more_rows BOOLEAN;
  DECLARE loop_cntr INT DEFAULT 0;
  DECLARE num_rows INT DEFAULT 0;
  DECLARE wflag  VARCHAR(10);

 CASE 

 WHEN (in_type = 'NW') THEN
SELECT sum(closing_balance) INTO retval from (
   SELECT sum(warehouses_data.closing_balance) as closing_balance
          
        FROM warehouses
         Inner Join  warehouses_data  ON  warehouses.pk_id  =   warehouses_data.warehouse_id 
				 Inner Join  stakeholders ON  warehouses.stakeholder_office_id =   stakeholders.pk_id
         WHERE     stakeholders.geo_level_id=1
         AND  warehouses_data.item_pack_size_id = in_item AND MONTH(warehouses_data.reporting_start_date) = in_month AND YEAR(warehouses_data.reporting_start_date) = in_year
   UNION 
  SELECT sum(hf_data_master.closing_balance) as closing_balance
          
        FROM warehouses
         Inner Join  hf_data_master  ON  warehouses.pk_id  =   hf_data_master.warehouse_id 
				 Inner Join  stakeholders ON  warehouses.stakeholder_office_id =   stakeholders.pk_id
         WHERE     stakeholders.geo_level_id=1
         AND  hf_data_master.item_pack_size_id = in_item AND MONTH(hf_data_master.reporting_start_date) = in_month AND YEAR(hf_data_master.reporting_start_date) = in_year
) A;

  SELECT REPgetConsumptionAVG(in_type, in_month, in_year, in_item, in_stk, in_prov, in_dist)
         INTO retval2
    FROM DUAL;
 
 WHEN (in_type = 'N') THEN
Select sum(closing_balance) INTO retval from (
   SELECT sum(warehouses_data.closing_balance) as closing_balance
         
        FROM warehouses
         Inner Join  warehouses_data  ON  warehouses.pk_id  =   warehouses_data.warehouse_id 
				 Inner Join  stakeholders ON  warehouses.stakeholder_office_id =   stakeholders.pk_id
         WHERE     stakeholders.geo_level_id>=1
         AND  warehouses_data.item_pack_size_id = in_item AND MONTH(warehouses_data.reporting_start_date) = in_month AND YEAR(warehouses_data.reporting_start_date) = in_year
    UNION
    SELECT sum(hf_data_master.closing_balance) as closing_balance
          
        FROM warehouses
         Inner Join  hf_data_master  ON  warehouses.pk_id  =   hf_data_master.warehouse_id 
				 Inner Join  stakeholders ON  warehouses.stakeholder_office_id =   stakeholders.pk_id
         WHERE     stakeholders.geo_level_id>=1
         AND  hf_data_master.item_pack_size_id = in_item AND MONTH(hf_data_master.reporting_start_date) = in_month AND YEAR(hf_data_master.reporting_start_date) = in_year
) A;

  SELECT REPgetConsumptionAVG(in_type, in_month, in_year, in_item, in_stk, in_prov, in_dist)
         INTO retval2
    FROM DUAL;
  


  WHEN (in_type = 'P') THEN
SELECT sum(closing_balance) INTO retval from (
   SELECT sum(warehouses_data.closing_balance) as closing_balance
          
        FROM warehouses
         Inner Join  warehouses_data  ON  warehouses.pk_id  =   warehouses_data.warehouse_id 
				 Inner Join  stakeholders ON  warehouses.stakeholder_office_id =   stakeholders.pk_id
         WHERE  warehouses_data.item_pack_size_id = in_item AND MONTH(warehouses_data.reporting_start_date) = in_month AND YEAR(warehouses_data.reporting_start_date) = in_year
         AND  warehouses.province_id = in_prov and   stakeholders.geo_level_id>=2
  UNION 
SELECT sum(hf_data_master.closing_balance) as closing_balance
         
        FROM warehouses
         Inner Join  hf_data_master  ON  warehouses.pk_id  =   hf_data_master.warehouse_id 
				 Inner Join  stakeholders ON  warehouses.stakeholder_office_id =   stakeholders.pk_id
         WHERE  hf_data_master.item_pack_size_id = in_item AND MONTH(hf_data_master.reporting_start_date) = in_month AND YEAR(hf_data_master.reporting_start_date) = in_year
         AND  warehouses.province_id = in_prov and   stakeholders.geo_level_id>=2

) A;
  SELECT REPgetConsumptionAVG(in_type, in_month, in_year, in_item, in_stk, in_prov, in_dist)
         INTO retval2
    FROM DUAL;

WHEN (in_type = 'PW') THEN

   SELECT sum(closing_balance) INTO retval from
(SELECT sum(warehouses_data.closing_balance) as closing_balance
        
        FROM warehouses
         Inner Join  warehouses_data  ON  warehouses.pk_id  =   warehouses_data.warehouse_id 
				 Inner Join  stakeholders ON  warehouses.stakeholder_office_id =   stakeholders.pk_id
         WHERE  warehouses_data.item_pack_size_id = in_item AND MONTH(warehouses_data.reporting_start_date) = in_month AND YEAR(warehouses_data.reporting_start_date) = in_year
         AND  warehouses.province_id = in_prov and   stakeholders.geo_level_id=2
UNION 
SELECT sum(hf_data_master.closing_balance) as closing_balance
          
         FROM warehouses
         Inner Join  hf_data_master  ON  warehouses.pk_id  =   hf_data_master.warehouse_id 
				 Inner Join  stakeholders ON  warehouses.stakeholder_office_id =   stakeholders.pk_id
         WHERE  hf_data_master.item_pack_size_id = in_item AND MONTH(hf_data_master.reporting_start_date) = in_month AND YEAR(hf_data_master.reporting_start_date) = in_year
         AND  warehouses.province_id = in_prov and   stakeholders.geo_level_id=2
) A;

  SELECT REPgetConsumptionAVG(in_type, in_month, in_year, in_item, in_stk, in_prov, in_dist)
         INTO retval2
    FROM DUAL;

WHEN (in_type = 'V') THEN
SELECT sum(closing_balance) INTO retval from (
   SELECT sum(warehouses_data.closing_balance) as closing_balance
          
        FROM warehouses
         Inner Join  warehouses_data  ON  warehouses.pk_id  =   warehouses_data.warehouse_id 
				 Inner Join  stakeholders ON  warehouses.stakeholder_office_id =   stakeholders.pk_id
         WHERE  warehouses_data.item_pack_size_id = in_item AND MONTH(warehouses_data.reporting_start_date) = in_month AND YEAR(warehouses_data.reporting_start_date) = in_year
         AND   warehouses.district_id in (SELECT
																					 locations.pk_id
																				FROM
																					 locations
																				WHERE
																					  locations.geo_level_id = 4
																				AND   locations.parent_id = in_prov)  and   stakeholders.geo_level_id>=3
UNION
SELECT sum(hf_data_master.closing_balance) as closing_balance
         
        FROM warehouses
         Inner Join  hf_data_master  ON  warehouses.pk_id  =   hf_data_master.warehouse_id 
				 Inner Join  stakeholders ON  warehouses.stakeholder_office_id =   stakeholders.pk_id
         WHERE  hf_data_master.item_pack_size_id = in_item AND MONTH(hf_data_master.reporting_start_date) = in_month AND YEAR(hf_data_master.reporting_start_date) = in_year
          AND   warehouses.district_id in (SELECT
																					 locations.pk_id
																				FROM
																					 locations
																				WHERE
																					  locations.geo_level_id = 4
																				AND   locations.parent_id = in_prov)  and   stakeholders.geo_level_id>=3
) A;

  SELECT REPgetConsumptionAVG(in_type, in_month, in_year, in_item, in_stk, in_prov, in_dist)
         INTO retval2
    FROM DUAL;

  WHEN (in_type = 'D') THEN
SELECT sum(closing_balance) INTO retval from
 ( SELECT sum(warehouses_data.closing_balance) as closing_balance
          
        FROM warehouses
         Inner Join  warehouses_data  ON  warehouses.pk_id  =   warehouses_data.warehouse_id 
				 Inner Join  stakeholders ON  warehouses.stakeholder_office_id =   stakeholders.pk_id
         WHERE  warehouses_data.item_pack_size_id = in_item AND MONTH(warehouses_data.reporting_start_date) = in_month AND YEAR(warehouses_data.reporting_start_date) = in_year
         AND   warehouses.district_id = in_prov AND   stakeholders.geo_level_id>=4
UNION
 SELECT sum(hf_data_master.closing_balance) as closing_balance
          
        FROM warehouses
         Inner Join  hf_data_master  ON  warehouses.pk_id  =   hf_data_master.warehouse_id 
				 Inner Join  stakeholders ON  warehouses.stakeholder_office_id =   stakeholders.pk_id
         WHERE  hf_data_master.item_pack_size_id = in_item AND MONTH(hf_data_master.reporting_start_date) = in_month AND YEAR(hf_data_master.reporting_start_date) = in_year
         AND   warehouses.district_id = in_prov AND   stakeholders.geo_level_id>=4
) A ;
 SELECT REPgetConsumptionAVG(in_type, in_month, in_year, in_item, in_stk, in_prov, in_dist)
         INTO retval2
    FROM DUAL;

 WHEN (in_type = 'DP') THEN
SELECT sum(closing_balance) INTO retval from
  (SELECT sum(warehouses_data.closing_balance) as closing_balance
         
        FROM warehouses
         Inner Join  warehouses_data  ON  warehouses.pk_id  =   warehouses_data.warehouse_id 
				 Inner Join  stakeholders ON  warehouses.stakeholder_office_id =   stakeholders.pk_id
         WHERE  warehouses_data.item_pack_size_id = in_item AND MONTH(warehouses_data.reporting_start_date) = in_month AND YEAR(warehouses_data.reporting_start_date) = in_year
         AND   warehouses.province_id = in_prov AND   stakeholders.geo_level_id=4
UNION 
SELECT sum(hf_data_master.closing_balance) as closing_balance
        
        FROM warehouses
         Inner Join  hf_data_master  ON  warehouses.pk_id  =   hf_data_master.warehouse_id 
				 Inner Join  stakeholders ON  warehouses.stakeholder_office_id =   stakeholders.pk_id
         WHERE  hf_data_master.item_pack_size_id = in_item AND MONTH(hf_data_master.reporting_start_date) = in_month AND YEAR(hf_data_master.reporting_start_date) = in_year
         AND   warehouses.province_id = in_prov AND   stakeholders.geo_level_id=4
) A;
 SELECT REPgetConsumptionAVG(in_type, in_month, in_year, in_item, in_stk, in_prov, in_dist)
         INTO retval2
    FROM DUAL;

  WHEN (in_type = 'DW') THEN
SELECT sum(closing_balance) INTO retval from
  (SELECT sum(warehouses_data.closing_balance) as closing_balance
         
        FROM warehouses
         Inner Join  warehouses_data  ON  warehouses.pk_id  =   warehouses_data.warehouse_id 
				 Inner Join  stakeholders ON  warehouses.stakeholder_office_id =   stakeholders.pk_id
         WHERE  warehouses_data.item_pack_size_id = in_item AND MONTH(warehouses_data.reporting_start_date) = in_month AND YEAR(warehouses_data.reporting_start_date) = in_year
         AND   warehouses.district_id = in_prov AND   stakeholders.geo_level_id=4
UNION 
SELECT sum(hf_data_master.closing_balance) as closing_balance
         
        FROM warehouses
         Inner Join  hf_data_master  ON  warehouses.pk_id  =   hf_data_master.warehouse_id 
				 Inner Join  stakeholders ON  warehouses.stakeholder_office_id =   stakeholders.pk_id
         WHERE  hf_data_master.item_pack_size_id = in_item AND MONTH(hf_data_master.reporting_start_date) = in_month AND YEAR(hf_data_master.reporting_start_date) = in_year
         AND   warehouses.district_id = in_prov AND   stakeholders.geo_level_id=4
) A;
 SELECT REPgetConsumptionAVG(in_type, in_month, in_year, in_item, in_stk, in_prov, in_dist)
         INTO retval2
    FROM DUAL;

  WHEN (in_type = 'DU') THEN
SELECT sum(closing_balance) INTO retval from
  (SELECT sum(warehouses_data.closing_balance) as closing_balance
         
        FROM warehouses
         Inner Join  warehouses_data  ON  warehouses.pk_id  =   warehouses_data.warehouse_id 
				 Inner Join  stakeholders ON  warehouses.stakeholder_office_id =   stakeholders.pk_id
         WHERE  warehouses_data.item_pack_size_id = in_item AND MONTH(warehouses_data.reporting_start_date) = in_month AND YEAR(warehouses_data.reporting_start_date) = in_year
         AND   warehouses.district_id = in_prov AND   stakeholders.geo_level_id=6
UNION 
SELECT sum(hf_data_master.closing_balance) as closing_balance
         
        FROM warehouses
         Inner Join  hf_data_master  ON  warehouses.pk_id  =   hf_data_master.warehouse_id 
				 Inner Join  stakeholders ON  warehouses.stakeholder_office_id =   stakeholders.pk_id
         WHERE  hf_data_master.item_pack_size_id = in_item AND MONTH(hf_data_master.reporting_start_date) = in_month AND YEAR(hf_data_master.reporting_start_date) = in_year
         AND   warehouses.district_id = in_prov AND   stakeholders.geo_level_id=6
) A;
 SELECT REPgetConsumptionAVG(in_type, in_month, in_year, in_item, in_stk, in_prov, in_dist)
         INTO retval2
    FROM DUAL;

WHEN (in_type = 'H') THEN
SELECT sum(closing_balance) INTO retval from 
  (SELECT sum(warehouses_data.closing_balance) as closing_balance
          
        FROM warehouses
         Inner Join  warehouses_data  ON  warehouses.pk_id  =   warehouses_data.warehouse_id 
				 Inner Join  stakeholders ON  warehouses.stakeholder_office_id =   stakeholders.pk_id
         WHERE  warehouses_data.item_pack_size_id = in_item AND MONTH(warehouses_data.reporting_start_date) = in_month AND YEAR(warehouses_data.reporting_start_date) = in_year
         AND  warehouses.location_id   in (
																				SELECT
																					 locations.pk_id
																				FROM
																					 locations
																				WHERE
																					  locations.parent_id = in_prov)  AND   stakeholders.geo_level_id>=5
UNION
SELECT sum(hf_data_master.closing_balance) as closing_balance
         
        FROM warehouses
         Inner Join  hf_data_master  ON  warehouses.pk_id  =   hf_data_master.warehouse_id 
				 Inner Join  stakeholders ON  warehouses.stakeholder_office_id =   stakeholders.pk_id
         WHERE  hf_data_master.item_pack_size_id = in_item AND MONTH(hf_data_master.reporting_start_date) = in_month AND YEAR(hf_data_master.reporting_start_date) = in_year
         AND  warehouses.location_id   in (
																				SELECT
																					 locations.pk_id
																				FROM
																					 locations
																				WHERE
																					  locations.parent_id = in_prov)  AND   stakeholders.geo_level_id>=5
) A;
 SELECT REPgetConsumptionAVG(in_type, in_month, in_year, in_item, in_stk, in_prov, in_dist)
         INTO retval2
    FROM DUAL;

WHEN (in_type = 'U') THEN
SELECT sum(closing_balance) INTO retval from 
		(SELECT sum(warehouses_data.closing_balance) as closing_balance
        
        FROM warehouses
         Inner Join  warehouses_data  ON  warehouses.pk_id  =   warehouses_data.warehouse_id 
				 Inner Join  stakeholders ON  warehouses.stakeholder_office_id =   stakeholders.pk_id
         WHERE  warehouses_data.item_pack_size_id = in_item AND MONTH(warehouses_data.reporting_start_date) = in_month AND YEAR(warehouses_data.reporting_start_date) = in_year
         AND   warehouses.location_id   = in_prov AND   stakeholders.geo_level_id=6
UNION
SELECT sum(hf_data_master.closing_balance) as closing_balance
       
        FROM warehouses
         Inner Join  hf_data_master  ON  warehouses.pk_id  =   hf_data_master.warehouse_id 
				 Inner Join  stakeholders ON  warehouses.stakeholder_office_id =   stakeholders.pk_id
         WHERE  hf_data_master.item_pack_size_id = in_item AND MONTH(hf_data_master.reporting_start_date) = in_month AND YEAR(hf_data_master.reporting_start_date) = in_year
         AND   warehouses.location_id   = in_prov AND   stakeholders.geo_level_id=6
) A ;
		SELECT REPgetConsumptionAVG(in_type, in_month, in_year, in_item, in_stk, in_prov, in_dist)
         INTO retval2
    FROM DUAL;

WHEN (in_type = 'UW') THEN
SELECT sum(closing_balance) INTO retval from
		(SELECT sum(warehouses_data.closing_balance) as closing_balance
         
        FROM warehouses
         Inner Join  warehouses_data  ON  warehouses.pk_id  =   warehouses_data.warehouse_id 
				 Inner Join  stakeholders ON  warehouses.stakeholder_office_id =   stakeholders.pk_id
         WHERE  warehouses_data.item_pack_size_id = in_item AND MONTH(warehouses_data.reporting_start_date) = in_month AND YEAR(warehouses_data.reporting_start_date) = in_year
         AND   warehouses.pk_id  = in_prov AND   stakeholders.geo_level_id=6
UNION 
SELECT sum(hf_data_master.closing_balance) as closing_balance
          
        FROM warehouses
         Inner Join  hf_data_master  ON  warehouses.pk_id  =   hf_data_master.warehouse_id 
				 Inner Join  stakeholders ON  warehouses.stakeholder_office_id =   stakeholders.pk_id
         WHERE  hf_data_master.item_pack_size_id = in_item AND MONTH(hf_data_master.reporting_start_date) = in_month AND YEAR(hf_data_master.reporting_start_date) = in_year
         AND   warehouses.pk_id  = in_prov AND   stakeholders.geo_level_id=6
) A;
		SELECT REPgetConsumptionAVG(in_type, in_month, in_year, in_item, in_stk, in_prov, in_dist)
         INTO retval2
    FROM DUAL;

 END CASE;

SET retval = IFNULL(retval,-1);
SET retval2 = IFNULL(retval2,-1);

 IF (retval > 0 AND retval2 > 0) THEN
  SET retstr = retval / retval2;
 END IF;

 return retstr;

END
;;
DELIMITER ;

-- ----------------------------
-- Function structure for REPgetReportingRateStr
-- ----------------------------
DROP FUNCTION IF EXISTS `REPgetReportingRateStr`;
DELIMITER ;;
CREATE DEFINER=`vlmis`@`%` FUNCTION `REPgetReportingRateStr`(`in_type` varchar(8),`in_month` int,`in_year` int,`in_item` varchar(8),`in_WF` varchar(8),`in_stk` int,`in_prov` int,`in_dist` varchar(8)) RETURNS varchar(20) CHARSET latin1
    DETERMINISTIC
BEGIN

DECLARE retval DECIMAL(5,2) ;
DECLARE numExptd INTEGER;
DECLARE numReptd INTEGER;
DECLARE retvalstr VARCHAR(5);

 IF (in_WF = 'F') THEN

-- field reporting rate 
     CASE
       WHEN (in_type ='N') THEN

-- National Report

 -- 1. Get total reports expected 
        SELECT count( warehouses.pk_id )
            INTO numExptd
          FROM warehouses INNER JOIN  stakeholders ON  warehouses.stakeholder_office_id =   stakeholders.pk_id
         WHERE   stakeholders.geo_level_id =6;

-- 2. Get total reports received

      SELECT count(distinct   warehouses_data.warehouse_id )
          INTO numReptd
         FROM warehouses
         Inner Join  warehouses_data  ON  warehouses.pk_id  =   warehouses_data.warehouse_id 
				 INNER JOIN  stakeholders ON  warehouses.stakeholder_office_id =   stakeholders.pk_id
         WHERE MONTH(warehouses_data.reporting_start_date) = in_month AND YEAR(warehouses_data.reporting_start_date) = in_year AND
							  stakeholders.geo_level_id =6;

-- Province Report

    WHEN (in_type ='P') THEN
        SELECT count( warehouses.pk_id )
            INTO numExptd
          FROM warehouses INNER JOIN  stakeholders ON  warehouses.stakeholder_office_id =   stakeholders.pk_id
         WHERE   stakeholders.geo_level_id = 6;

				SELECT count(distinct   warehouses_data.warehouse_id )
          INTO numReptd
         FROM warehouses
         Inner Join  warehouses_data  ON  warehouses.pk_id  =   warehouses_data.warehouse_id 
				 INNER JOIN  stakeholders ON  warehouses.stakeholder_office_id =   stakeholders.pk_id
         WHERE  warehouses_data.item_pack_size_id=in_item
         AND MONTH(warehouses_data.reporting_start_date) = in_month 
				 AND YEAR(warehouses_data.reporting_start_date) = in_year 
				 AND   stakeholders.geo_level_id = 6;   

  WHEN (in_type ='D') THEN
        SELECT count( warehouses.pk_id )
            INTO numExptd
          FROM warehouses INNER JOIN  stakeholders ON  warehouses.stakeholder_office_id =   stakeholders.pk_id
         WHERE   stakeholders.geo_level_id = 6;

				SELECT count(distinct   warehouses_data.warehouse_id )
          INTO numReptd
         FROM warehouses
         Inner Join  warehouses_data  ON  warehouses.pk_id  =   warehouses_data.warehouse_id 
				 INNER JOIN  stakeholders ON  warehouses.stakeholder_office_id =   stakeholders.pk_id
         WHERE  warehouses_data.item_pack_size_id=in_item
         AND MONTH(warehouses_data.reporting_start_date) = in_month 
				 AND YEAR(warehouses_data.reporting_start_date) = in_year 
				 AND   stakeholders.geo_level_id = 6;   

  END CASE;

 ELSE
-- warehouse reporting rate 
    CASE
        WHEN (in_type ='N') THEN

-- National Report
       --  1. Get total reports expected 
        SELECT count( warehouses.pk_id )
            INTO numExptd
          FROM warehouses INNER JOIN  stakeholders ON  warehouses.stakeholder_office_id =   stakeholders.pk_id
         WHERE   stakeholders.geo_level_id = 4 ;

-- 2. Get total reports received
      SELECT count(distinct   warehouses_data.warehouse_id )
          INTO numReptd
         FROM warehouses
         Inner Join  warehouses_data  ON  warehouses.pk_id  =   warehouses_data.warehouse_id 
				 INNER JOIN  stakeholders ON  warehouses.stakeholder_office_id =   stakeholders.pk_id
         WHERE MONTH(warehouses_data.reporting_start_date) = in_month 
					AND YEAR(warehouses_data.reporting_start_date) = in_year 
					AND   stakeholders.geo_level_id = 4;

-- Province Report

 WHEN (in_type = 'P') THEN
       SELECT count( warehouses.pk_id )
            INTO numExptd
          FROM warehouses INNER JOIN  stakeholders ON  warehouses.stakeholder_office_id =   stakeholders.pk_id
         WHERE   stakeholders.geo_level_id = 4;
			

				SELECT count(distinct   warehouses_data.warehouse_id )
          INTO numReptd
         FROM warehouses
         Inner Join  warehouses_data  ON  warehouses.pk_id  =   warehouses_data.warehouse_id 
				 INNER JOIN  stakeholders ON  warehouses.stakeholder_office_id =   stakeholders.pk_id
         WHERE  warehouses_data.item_pack_size_id=in_item
					AND MONTH(warehouses_data.reporting_start_date) = in_month 
					AND YEAR(warehouses_data.reporting_start_date) = in_year 
					AND   stakeholders.geo_level_id = 4; 

 WHEN (in_type = 'D') THEN
       SELECT count( warehouses.pk_id )
            INTO numExptd
          FROM warehouses INNER JOIN  stakeholders ON  warehouses.stakeholder_office_id =   stakeholders.pk_id
         WHERE   stakeholders.geo_level_id = 4;
			
			SELECT count(distinct warehouses_data.warehouse_id )
          INTO numReptd
         FROM warehouses
         Inner Join  warehouses_data  ON  warehouses.pk_id  =   warehouses_data.warehouse_id 
				 INNER JOIN  stakeholders ON  warehouses.stakeholder_office_id =   stakeholders.pk_id
         WHERE   warehouses_data.item_pack_size_id=in_item
					AND MONTH(warehouses_data.reporting_start_date) = in_month 
					AND YEAR(warehouses_data.reporting_start_date) = in_year 
					AND   stakeholders.geo_level_id = 4; 

  END CASE;
END IF;

    SET numExptd = IFNULL(numExptd,0);
    SET numReptd = IFNULL(numReptd,0);

		IF (numExptd > 0 and numReptd > 0) THEN
      set retval = numReptd / numExptd * 100;
      SET retvalstr = round(retval);
		else
       SET retvalstr = 'NA';
    end if;

-- SET retvalstr="0";
     /*set retvalstr = CONCAT(in_type,',',in_id,',',in_month,',',in_year,',',in_item,',',in_WF,',',in_stk,',',in_prov);*/
 RETURN(retvalstr);

    END
;;
DELIMITER ;

-- ----------------------------
-- Function structure for REPgetRR
-- ----------------------------
DROP FUNCTION IF EXISTS `REPgetRR`;
DELIMITER ;;
CREATE DEFINER=`vlmis`@`%` FUNCTION `REPgetRR`(in_lvl VARCHAR(10), in_start_date DATE, in_end_date DATE, in_stk INT, in_item INT, in_loc INT, aggregation INT) RETURNS varchar(300) CHARSET latin1
    DETERMINISTIC
BEGIN

DECLARE retval VARCHAR(300);
DECLARE totalWH INT;
DECLARE reportedWH INT;
/* Written by Muhammad Waqas Azeem waqasazeemcs06@gmail.com */

CASE 
	WHEN (aggregation = 1) THEN

		CASE
			WHEN (in_lvl = 'N') THEN
				SELECT
					COUNT(DISTINCT UC.pk_id) INTO totalWH
				FROM
					locations AS UC
				INNER JOIN warehouses ON UC.pk_id = warehouses.location_id
				WHERE
					UC.geo_level_id = 6
				AND warehouses.stakeholder_id = in_stk
				AND warehouses.status = 1;
			
				SELECT
					ROUND((COUNT(DISTINCT UC.pk_id) / totalWH) * 100) INTO retval
				FROM
					locations AS UC
				INNER JOIN warehouses ON UC.pk_id = warehouses.location_id
				INNER JOIN warehouses_data ON warehouses.pk_id = warehouses_data.warehouse_id
				WHERE
					UC.geo_level_id = 6
				AND warehouses.stakeholder_id = in_stk
				AND warehouses_data.reporting_start_date BETWEEN in_start_date AND in_end_date
				AND warehouses_data.issue_balance IS NOT NULL
				AND warehouses_data.item_pack_size_id = in_item
				AND warehouses.status = 1;

			WHEN (in_lvl = 'P') THEN
				SELECT
					COUNT(DISTINCT UC.pk_id) INTO totalWH
				FROM
					locations AS UC
				INNER JOIN warehouses ON UC.pk_id = warehouses.location_id
				WHERE
					UC.geo_level_id = 6
				AND warehouses.stakeholder_id = in_stk
				AND warehouses.status = 1
				AND UC.province_id = in_loc;
			
				SELECT
					ROUND((COUNT(DISTINCT UC.pk_id) / totalWH) * 100) INTO retval
				FROM
					locations AS UC
				INNER JOIN warehouses ON UC.pk_id = warehouses.location_id
				INNER JOIN warehouses_data ON warehouses.pk_id = warehouses_data.warehouse_id
				WHERE
					UC.geo_level_id = 6
				AND warehouses.stakeholder_id = in_stk
				AND warehouses_data.reporting_start_date BETWEEN in_start_date AND in_end_date
				AND warehouses_data.issue_balance IS NOT NULL
				AND warehouses_data.item_pack_size_id = in_item
				AND warehouses.status = 1
				AND UC.province_id = in_loc;

			WHEN (in_lvl = 'D') THEN
				SELECT
					COUNT(DISTINCT UC.pk_id) INTO totalWH
				FROM
					locations AS UC
				INNER JOIN warehouses ON UC.pk_id = warehouses.location_id
				WHERE
					UC.geo_level_id = 6
				AND warehouses.stakeholder_id = in_stk
				AND warehouses.status = 1
				AND UC.district_id = in_loc;
			
				SELECT
					ROUND((COUNT(DISTINCT UC.pk_id) / totalWH) * 100) INTO retval
				FROM
					locations AS UC
				INNER JOIN warehouses ON UC.pk_id = warehouses.location_id
				INNER JOIN warehouses_data ON warehouses.pk_id = warehouses_data.warehouse_id
				WHERE
					UC.geo_level_id = 6
				AND warehouses.stakeholder_id = in_stk
				AND warehouses_data.reporting_start_date BETWEEN in_start_date AND in_end_date
				AND warehouses_data.issue_balance IS NOT NULL
				AND warehouses_data.item_pack_size_id = in_item
				AND warehouses.status = 1
				AND UC.district_id = in_loc;

			WHEN (in_lvl = 'T') THEN
				SELECT
					COUNT(DISTINCT UC.pk_id) INTO totalWH
				FROM
					locations AS UC
				INNER JOIN warehouses ON UC.pk_id = warehouses.location_id
				WHERE
					UC.geo_level_id = 6
				AND warehouses.stakeholder_id = in_stk
				AND warehouses.status = 1
				AND UC.parent_id = in_loc;
			
				SELECT
					ROUND((COUNT(DISTINCT UC.pk_id) / totalWH) * 100) INTO retval
				FROM
					locations AS UC
				INNER JOIN warehouses ON UC.pk_id = warehouses.location_id
				INNER JOIN warehouses_data ON warehouses.pk_id = warehouses_data.warehouse_id
				WHERE
					UC.geo_level_id = 6
				AND warehouses.stakeholder_id = in_stk
				AND warehouses_data.reporting_start_date BETWEEN in_start_date AND in_end_date
				AND warehouses_data.issue_balance IS NOT NULL
				AND warehouses_data.item_pack_size_id = in_item
				AND warehouses.status = 1
				AND UC.parent_id = in_loc;

			WHEN (in_lvl = 'U') THEN
				SELECT
					COUNT(DISTINCT UC.pk_id) INTO totalWH
				FROM
					locations AS UC
				INNER JOIN warehouses ON UC.pk_id = warehouses.location_id
				WHERE
					UC.geo_level_id = 6
				AND warehouses.stakeholder_id = in_stk
				AND warehouses.status = 1
				AND UC.pk_id = in_loc;
			
				SELECT
					ROUND((COUNT(DISTINCT UC.pk_id) / totalWH) * 100) INTO retval
				FROM
					locations AS UC
				INNER JOIN warehouses ON UC.pk_id = warehouses.location_id
				INNER JOIN warehouses_data ON warehouses.pk_id = warehouses_data.warehouse_id
				WHERE
					UC.geo_level_id = 6
				AND warehouses.stakeholder_id = in_stk
				AND warehouses_data.reporting_start_date BETWEEN in_start_date AND in_end_date
				AND warehouses_data.issue_balance IS NOT NULL
				AND warehouses_data.item_pack_size_id = in_item
				AND warehouses.status = 1
				AND UC.pk_id = in_loc;

		END CASE;

	WHEN (aggregation = 0) THEN

		CASE
			WHEN (in_lvl = 'N') THEN
				SELECT
					COUNT(DISTINCT UC.pk_id) INTO totalWH
				FROM
					locations AS UC
				INNER JOIN warehouses ON UC.pk_id = warehouses.location_id
				WHERE
					UC.geo_level_id = 6
				AND warehouses.stakeholder_id = in_stk
				AND warehouses.status = 1;
			
				SELECT GROUP_CONCAT(ROUND(A.RR) SEPARATOR '*') INTO retval FROM (
					SELECT
						(COUNT(DISTINCT UC.pk_id) / totalWH) * 100 AS RR
					FROM
						locations AS UC
					INNER JOIN warehouses ON UC.pk_id = warehouses.location_id
					INNER JOIN warehouses_data ON warehouses.pk_id = warehouses_data.warehouse_id
					WHERE
						UC.geo_level_id = 6
					AND warehouses.stakeholder_id = in_stk
					AND warehouses_data.reporting_start_date BETWEEN in_start_date AND in_end_date
					AND warehouses_data.issue_balance IS NOT NULL
					AND warehouses_data.item_pack_size_id = in_item
					AND warehouses.status = 1
					GROUP BY
						warehouses_data.reporting_start_date) A;

			WHEN (in_lvl = 'P') THEN
				SELECT
					COUNT(DISTINCT UC.pk_id) INTO totalWH
				FROM
					locations AS UC
				INNER JOIN warehouses ON UC.pk_id = warehouses.location_id
				WHERE
					UC.geo_level_id = 6
				AND warehouses.stakeholder_id = in_stk
				AND warehouses.status = 1
				AND UC.province_id = in_loc;
			
				SELECT GROUP_CONCAT(ROUND(A.RR) SEPARATOR '*') INTO retval FROM (
					SELECT
						(COUNT(DISTINCT UC.pk_id) / totalWH) * 100 AS RR
					FROM
						locations AS UC
					INNER JOIN warehouses ON UC.pk_id = warehouses.location_id
					INNER JOIN warehouses_data ON warehouses.pk_id = warehouses_data.warehouse_id
					WHERE
						UC.geo_level_id = 6
					AND warehouses.stakeholder_id = in_stk
					AND warehouses_data.reporting_start_date BETWEEN in_start_date AND in_end_date
					AND warehouses_data.issue_balance IS NOT NULL
					AND warehouses_data.item_pack_size_id = in_item
					AND warehouses.status = 1
					AND UC.province_id = in_loc
					GROUP BY
						warehouses_data.reporting_start_date) A;

			WHEN (in_lvl = 'D') THEN
				SELECT
					COUNT(DISTINCT UC.pk_id) INTO totalWH
				FROM
					locations AS UC
				INNER JOIN warehouses ON UC.pk_id = warehouses.location_id
				WHERE
					UC.geo_level_id = 6
				AND warehouses.stakeholder_id = in_stk
				AND warehouses.status = 1
				AND UC.district_id = in_loc;
			
				SELECT GROUP_CONCAT(ROUND(A.RR) SEPARATOR '*') INTO retval FROM (
					SELECT
						(COUNT(DISTINCT UC.pk_id) / totalWH) * 100 AS RR
					FROM
						locations AS UC
					INNER JOIN warehouses ON UC.pk_id = warehouses.location_id
					INNER JOIN warehouses_data ON warehouses.pk_id = warehouses_data.warehouse_id
					WHERE
						UC.geo_level_id = 6
					AND warehouses.stakeholder_id = in_stk
					AND warehouses_data.reporting_start_date BETWEEN in_start_date AND in_end_date
					AND warehouses_data.issue_balance IS NOT NULL
					AND warehouses_data.item_pack_size_id = in_item
					AND warehouses.status = 1
					AND UC.district_id = in_loc
					GROUP BY
						warehouses_data.reporting_start_date) A;

			WHEN (in_lvl = 'T') THEN
				SELECT
					COUNT(DISTINCT UC.pk_id) INTO totalWH
				FROM
					locations AS UC
				INNER JOIN warehouses ON UC.pk_id = warehouses.location_id
				WHERE
					UC.geo_level_id = 6
				AND warehouses.stakeholder_id = in_stk
				AND warehouses.status = 1
				AND UC.parent_id = in_loc;
			
				SELECT GROUP_CONCAT(ROUND(A.RR) SEPARATOR '*') INTO retval FROM (
					SELECT
						(COUNT(DISTINCT UC.pk_id) / totalWH) * 100 AS RR
					FROM
						locations AS UC
					INNER JOIN warehouses ON UC.pk_id = warehouses.location_id
					INNER JOIN warehouses_data ON warehouses.pk_id = warehouses_data.warehouse_id
					WHERE
						UC.geo_level_id = 6
					AND warehouses.stakeholder_id = in_stk
					AND warehouses_data.reporting_start_date BETWEEN in_start_date AND in_end_date
					AND warehouses_data.issue_balance IS NOT NULL
					AND warehouses_data.item_pack_size_id = in_item
					AND warehouses.status = 1
					AND UC.parent_id = in_loc
					GROUP BY
						warehouses_data.reporting_start_date) A;

		END CASE;

END CASE;

return retval;

END
;;
DELIMITER ;

-- ----------------------------
-- Function structure for REPgetRR_copy
-- ----------------------------
DROP FUNCTION IF EXISTS `REPgetRR_copy`;
DELIMITER ;;
CREATE DEFINER=`vlmis`@`%` FUNCTION `REPgetRR_copy`(in_lvl VARCHAR(10), in_start_date DATE, in_end_date DATE, in_stk INT, in_item INT, in_loc INT, aggregation INT) RETURNS varchar(300) CHARSET latin1
    DETERMINISTIC
BEGIN

DECLARE retval VARCHAR(300);
DECLARE totalWH INT;
DECLARE reportedWH INT;
/* Written by Muhammad Waqas Azeem waqasazeemcs06@gmail.com */

CASE 
	WHEN (aggregation = 1) THEN

		CASE
			WHEN (in_lvl = 'N') THEN
				SELECT
					COUNT(DISTINCT UC.pk_id) INTO totalWH
				FROM
					locations AS UC
				INNER JOIN warehouses ON UC.pk_id = warehouses.location_id
				WHERE
					UC.geo_level_id = 6
				AND warehouses.stakeholder_id = in_stk;
			
				SELECT
					ROUND((COUNT(DISTINCT UC.pk_id) / totalWH) * 100) INTO retval
				FROM
					locations AS UC
				INNER JOIN warehouses ON UC.pk_id = warehouses.location_id
				INNER JOIN warehouses_data ON warehouses.pk_id = warehouses_data.warehouse_id
				WHERE
					UC.geo_level_id = 6
				AND warehouses.stakeholder_id = in_stk
				AND warehouses_data.reporting_start_date BETWEEN in_start_date AND in_end_date
				AND warehouses_data.issue_balance IS NOT NULL
				AND warehouses_data.item_pack_size_id = in_item;

			WHEN (in_lvl = 'P') THEN
				SELECT
					COUNT(DISTINCT UC.pk_id) INTO totalWH
				FROM
					locations AS UC
				INNER JOIN warehouses ON UC.pk_id = warehouses.location_id
				WHERE
					UC.geo_level_id = 6
				AND warehouses.stakeholder_id = in_stk
				AND UC.province_id = in_loc;
			
				SELECT
					ROUND((COUNT(DISTINCT UC.pk_id) / totalWH) * 100) INTO retval
				FROM
					locations AS UC
				INNER JOIN warehouses ON UC.pk_id = warehouses.location_id
				INNER JOIN warehouses_data ON warehouses.pk_id = warehouses_data.warehouse_id
				WHERE
					UC.geo_level_id = 6
				AND warehouses.stakeholder_id = in_stk
				AND warehouses_data.reporting_start_date BETWEEN in_start_date AND in_end_date
				AND warehouses_data.issue_balance IS NOT NULL
				AND warehouses_data.item_pack_size_id = in_item
				AND UC.province_id = in_loc;

			WHEN (in_lvl = 'D') THEN
				SELECT
					COUNT(DISTINCT UC.pk_id) INTO totalWH
				FROM
					locations AS UC
				INNER JOIN warehouses ON UC.pk_id = warehouses.location_id
				WHERE
					UC.geo_level_id = 6
				AND warehouses.stakeholder_id = in_stk
				AND UC.district_id = in_loc;
			
				SELECT
					ROUND((COUNT(DISTINCT UC.pk_id) / totalWH) * 100) INTO retval
				FROM
					locations AS UC
				INNER JOIN warehouses ON UC.pk_id = warehouses.location_id
				INNER JOIN warehouses_data ON warehouses.pk_id = warehouses_data.warehouse_id
				WHERE
					UC.geo_level_id = 6
				AND warehouses.stakeholder_id = in_stk
				AND warehouses_data.reporting_start_date BETWEEN in_start_date AND in_end_date
				AND warehouses_data.issue_balance IS NOT NULL
				AND warehouses_data.item_pack_size_id = in_item
				AND UC.district_id = in_loc;

		END CASE;

	WHEN (aggregation = 0) THEN

		CASE
			WHEN (in_lvl = 'N') THEN
				SELECT
					COUNT(DISTINCT UC.pk_id) INTO totalWH
				FROM
					locations AS UC
				INNER JOIN warehouses ON UC.pk_id = warehouses.location_id
				WHERE
					UC.geo_level_id = 6
				AND warehouses.stakeholder_id = in_stk;
			
				SELECT GROUP_CONCAT(ROUND(A.RR) SEPARATOR '*') INTO retval FROM (
					SELECT
						(COUNT(DISTINCT UC.pk_id) / totalWH) * 100 AS RR
					FROM
						locations AS UC
					INNER JOIN warehouses ON UC.pk_id = warehouses.location_id
					INNER JOIN warehouses_data ON warehouses.pk_id = warehouses_data.warehouse_id
					WHERE
						UC.geo_level_id = 6
					AND warehouses.stakeholder_id = in_stk
					AND warehouses_data.reporting_start_date BETWEEN in_start_date AND in_end_date
					AND warehouses_data.issue_balance IS NOT NULL
					AND warehouses_data.item_pack_size_id = in_item
					GROUP BY
						warehouses_data.reporting_start_date) A;

			WHEN (in_lvl = 'P') THEN
				SELECT
					COUNT(DISTINCT UC.pk_id) INTO totalWH
				FROM
					locations AS UC
				INNER JOIN warehouses ON UC.pk_id = warehouses.location_id
				WHERE
					UC.geo_level_id = 6
				AND warehouses.stakeholder_id = in_stk
				AND UC.province_id = in_loc;
			
				SELECT GROUP_CONCAT(ROUND(A.RR) SEPARATOR '*') INTO retval FROM (
					SELECT
						(COUNT(DISTINCT UC.pk_id) / totalWH) * 100 AS RR
					FROM
						locations AS UC
					INNER JOIN warehouses ON UC.pk_id = warehouses.location_id
					INNER JOIN warehouses_data ON warehouses.pk_id = warehouses_data.warehouse_id
					WHERE
						UC.geo_level_id = 6
					AND warehouses.stakeholder_id = in_stk
					AND warehouses_data.reporting_start_date BETWEEN in_start_date AND in_end_date
					AND warehouses_data.issue_balance IS NOT NULL
					AND warehouses_data.item_pack_size_id = in_item
					AND UC.province_id = in_loc
					GROUP BY
						warehouses_data.reporting_start_date) A;

			WHEN (in_lvl = 'D') THEN
				SELECT
					COUNT(DISTINCT UC.pk_id) INTO totalWH
				FROM
					locations AS UC
				INNER JOIN warehouses ON UC.pk_id = warehouses.location_id
				WHERE
					UC.geo_level_id = 6
				AND warehouses.stakeholder_id = in_stk
				AND UC.district_id = in_loc;
			
				SELECT GROUP_CONCAT(ROUND(A.RR) SEPARATOR '*') INTO retval FROM (
					SELECT
						(COUNT(DISTINCT UC.pk_id) / totalWH) * 100 AS RR
					FROM
						locations AS UC
					INNER JOIN warehouses ON UC.pk_id = warehouses.location_id
					INNER JOIN warehouses_data ON warehouses.pk_id = warehouses_data.warehouse_id
					WHERE
						UC.geo_level_id = 6
					AND warehouses.stakeholder_id = in_stk
					AND warehouses_data.reporting_start_date BETWEEN in_start_date AND in_end_date
					AND warehouses_data.issue_balance IS NOT NULL
					AND warehouses_data.item_pack_size_id = in_item
					AND UC.district_id = in_loc
					GROUP BY
						warehouses_data.reporting_start_date) A;

		END CASE;

END CASE;

return retval;

END
;;
DELIMITER ;

-- ----------------------------
-- Function structure for REPgetTotalUCs
-- ----------------------------
DROP FUNCTION IF EXISTS `REPgetTotalUCs`;
DELIMITER ;;
CREATE DEFINER=`vlmis`@`%` FUNCTION `REPgetTotalUCs`(in_lvl varchar(8), in_loc INT, in_stk INT) RETURNS int(11)
    DETERMINISTIC
BEGIN

DECLARE totalUCs INTEGER;
/* Written by Muhammad Waqas Azeem waqasazeemcs06@gmail.com */

CASE
	WHEN (in_lvl = 'N') THEN
		SELECT
			COUNT(DISTINCT UC.pk_id) INTO totalUCs
		FROM
			locations AS UC
		INNER JOIN warehouses ON UC.pk_id = warehouses.location_id
		WHERE
			UC.geo_level_id = 6
		AND warehouses.stakeholder_id = in_stk;

	WHEN (in_lvl = 'P') THEN
		SELECT
			COUNT(DISTINCT UC.pk_id) INTO totalUCs
		FROM
			locations AS UC
		INNER JOIN warehouses ON UC.pk_id = warehouses.location_id
		WHERE
			UC.geo_level_id = 6
		AND warehouses.stakeholder_id = in_stk
		AND UC.province_id = in_loc;

	WHEN (in_lvl = 'D') THEN
		SELECT
			COUNT(DISTINCT UC.pk_id) INTO totalUCs
		FROM
			locations AS UC
		INNER JOIN warehouses ON UC.pk_id = warehouses.location_id
		WHERE
			UC.geo_level_id = 6
		AND warehouses.stakeholder_id = in_stk
		AND UC.district_id = in_loc;

	WHEN (in_lvl = 'T') THEN
		SELECT
			COUNT(DISTINCT UC.pk_id) INTO totalUCs
		FROM
			locations AS UC
		INNER JOIN warehouses ON UC.pk_id = warehouses.location_id
		WHERE
			UC.geo_level_id = 6
		AND warehouses.stakeholder_id = in_stk
		AND UC.parent_id = in_loc;

	WHEN (in_lvl = 'U') THEN
		SELECT
			COUNT(DISTINCT UC.pk_id) INTO totalUCs
		FROM
			locations AS UC
		INNER JOIN warehouses ON UC.pk_id = warehouses.location_id
		WHERE
			UC.geo_level_id = 6
		AND warehouses.stakeholder_id = in_stk
		AND UC.pk_id = in_loc;

END CASE;

return totalUCs;

END
;;
DELIMITER ;

-- ----------------------------
-- Function structure for REPgetTransWHData
-- ----------------------------
DROP FUNCTION IF EXISTS `REPgetTransWHData`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `REPgetTransWHData`(in_type INTEGER,  in_month INTEGER, in_year INTEGER, in_item VARCHAR(20), in_wh INTEGER) RETURNS double
    READS SQL DATA
    DETERMINISTIC
BEGIN
 
  DECLARE retval INTEGER;

   CASE
  WHEN (in_type = 1) THEN
-- Aggreate warehouse closing balance national
	SELECT
		IFNULL(SUM(ABS(stock_detail.quantity)),0) INTO retval 
	FROM
		stock_master
	INNER JOIN  stock_detail ON   stock_detail.stock_master_id =  stock_master.pk_id
	INNER JOIN stock_batch ON   stock_detail.stock_batch_id = stock_batch.pk_id
	WHERE
		stock_master.to_warehouse_id = in_wh
	AND stock_batch.item_pack_size_id = in_item
	AND MONTH ( stock_master.transaction_date) = in_month
	AND YEAR ( stock_master.transaction_date) = in_year AND
stock_master.transaction_type_id = 1;

  
  WHEN (in_type = 2) THEN
-- Aggreate warehouse closing balance for selected province 
  SELECT
		IFNULL(SUM(ABS(stock_detail.quantity)),0) INTO retval 
	FROM
		stock_master
	INNER JOIN  stock_detail ON   stock_detail.stock_master_id =  stock_master.pk_id
	INNER JOIN stock_batch ON   stock_detail.stock_batch_id = stock_batch.pk_id
	WHERE
		stock_master.from_warehouse_id = in_wh
	AND stock_batch.item_pack_size_id = in_item
	AND MONTH ( stock_master.transaction_date) = in_month
	AND YEAR ( stock_master.transaction_date) = in_year AND
stock_master.transaction_type_id = 2;

WHEN (in_type = 3) THEN
-- Aggreate warehouse closing balance for selected province 
   SELECT
		IFNULL(SUM(stock_detail.quantity),0) INTO retval
	FROM
		stock_master
	INNER JOIN  stock_detail ON   stock_detail.stock_master_id =  stock_master.pk_id
	INNER JOIN stock_batch ON   stock_detail.stock_batch_id = stock_batch.pk_id
	WHERE
		stock_master.from_warehouse_id = in_wh
	AND stock_batch.item_pack_size_id = in_item
	AND MONTH ( stock_master.transaction_date) = in_month
	AND YEAR ( stock_master.transaction_date) = in_year AND
stock_master.transaction_type_id > 2;
  
 END CASE;

 -- SET retval = IFNULL(retval,0);
 return retval;

END
;;
DELIMITER ;

-- ----------------------------
-- Function structure for REPgetWastage
-- ----------------------------
DROP FUNCTION IF EXISTS `REPgetWastage`;
DELIMITER ;;
CREATE DEFINER=`vlmis`@`%` FUNCTION `REPgetWastage`(in_lvl VARCHAR(10), in_start_date DATE, in_end_date DATE, in_stk INT, in_item INT, in_loc INT, aggregation INT) RETURNS varchar(300) CHARSET latin1
    DETERMINISTIC
BEGIN

DECLARE retval VARCHAR(300);
/* Written by Muhammad Waqas Azeem waqasazeemcs06@gmail.com */

CASE 
	WHEN (aggregation = 1) THEN

		CASE
			WHEN (in_lvl = 'N') THEN
				SELECT
					ROUND(IFNULL((sum(warehouses_data.wastages) / (SUM(warehouses_data.issue_balance) + sum(warehouses_data.wastages))) * 100,0),1) INTO retval
				FROM
					locations AS UC
				INNER JOIN warehouses ON UC.pk_id = warehouses.location_id
				INNER JOIN warehouses_data ON warehouses.pk_id = warehouses_data.warehouse_id
				WHERE
					UC.geo_level_id = 6
				AND warehouses.stakeholder_id = in_stk
				AND warehouses_data.reporting_start_date BETWEEN in_start_date AND in_end_date
				AND warehouses_data.issue_balance IS NOT NULL
				AND warehouses_data.item_pack_size_id = in_item
				AND warehouses.status = 1;

			WHEN (in_lvl = 'P') THEN
				SELECT
					ROUND(IFNULL((sum(warehouses_data.wastages) / (SUM(warehouses_data.issue_balance) + sum(warehouses_data.wastages))) * 100,0),1) INTO retval
				FROM
					locations AS UC
				INNER JOIN warehouses ON UC.pk_id = warehouses.location_id
				INNER JOIN warehouses_data ON warehouses.pk_id = warehouses_data.warehouse_id
				WHERE
					UC.geo_level_id = 6
				AND warehouses.stakeholder_id = in_stk
				AND warehouses_data.reporting_start_date BETWEEN in_start_date AND in_end_date
				AND warehouses_data.issue_balance IS NOT NULL
				AND warehouses_data.item_pack_size_id = in_item
				AND warehouses.status = 1
				AND UC.province_id = in_loc;

			WHEN (in_lvl = 'D') THEN
				SELECT
					ROUND(IFNULL((sum(warehouses_data.wastages) / (SUM(warehouses_data.issue_balance) + sum(warehouses_data.wastages))) * 100,0),1) INTO retval
				FROM
					locations AS UC
				INNER JOIN warehouses ON UC.pk_id = warehouses.location_id
				INNER JOIN warehouses_data ON warehouses.pk_id = warehouses_data.warehouse_id
				WHERE
					UC.geo_level_id = 6
				AND warehouses.stakeholder_id = in_stk
				AND warehouses_data.reporting_start_date BETWEEN in_start_date AND in_end_date
				AND warehouses_data.issue_balance IS NOT NULL
				AND warehouses_data.item_pack_size_id = in_item
				AND warehouses.status = 1
				AND UC.district_id = in_loc;

			WHEN (in_lvl = 'T') THEN
				SELECT
					ROUND(IFNULL((sum(warehouses_data.wastages) / (SUM(warehouses_data.issue_balance) + sum(warehouses_data.wastages))) * 100,0),1) INTO retval
				FROM
					locations AS UC
				INNER JOIN warehouses ON UC.pk_id = warehouses.location_id
				INNER JOIN locations AS Tehsil ON UC.pk_id = Tehsil.parent_id
				INNER JOIN warehouses_data ON warehouses.pk_id = warehouses_data.warehouse_id
				WHERE
					UC.geo_level_id = 6
				AND warehouses.stakeholder_id = in_stk
				AND warehouses_data.reporting_start_date BETWEEN in_start_date AND in_end_date
				AND warehouses_data.issue_balance IS NOT NULL
				AND warehouses_data.item_pack_size_id = in_item
				AND warehouses.status = 1
				AND Tehsil.pk_id = in_loc;

			WHEN (in_lvl = 'U') THEN
				SELECT
					ROUND(IFNULL((sum(warehouses_data.wastages) / (SUM(warehouses_data.issue_balance) + sum(warehouses_data.wastages))) * 100,0),1) INTO retval
				FROM
					locations AS UC
				INNER JOIN warehouses ON UC.pk_id = warehouses.location_id
				INNER JOIN warehouses_data ON warehouses.pk_id = warehouses_data.warehouse_id
				WHERE
					UC.geo_level_id = 6
				AND warehouses.stakeholder_id = in_stk
				AND warehouses_data.reporting_start_date BETWEEN in_start_date AND in_end_date
				AND warehouses_data.issue_balance IS NOT NULL
				AND warehouses_data.item_pack_size_id = in_item
				AND warehouses.status = 1
				AND UC.pk_id = in_loc;

		END CASE;

	WHEN (aggregation = 0) THEN
	
		CASE
			WHEN (in_lvl = 'N') THEN
				#SET retval = 1000;
				SELECT GROUP_CONCAT(A.wastages SEPARATOR '*') INTO retval FROM (
					SELECT
						ROUND(IFNULL((sum(warehouses_data.wastages) / (SUM(warehouses_data.issue_balance) + sum(warehouses_data.wastages))) * 100,0),1) AS wastages
					FROM
						locations AS UC
					INNER JOIN warehouses ON UC.pk_id = warehouses.location_id
					INNER JOIN warehouses_data ON warehouses.pk_id = warehouses_data.warehouse_id
					WHERE
						UC.geo_level_id = 6
					AND warehouses.stakeholder_id = in_stk
					AND warehouses_data.reporting_start_date BETWEEN in_start_date AND in_end_date
					AND warehouses_data.issue_balance IS NOT NULL
					AND warehouses_data.item_pack_size_id = in_item
					AND warehouses.status = 1
					GROUP BY warehouses_data.reporting_start_date) A;

			WHEN (in_lvl = 'P') THEN
				SELECT GROUP_CONCAT(A.wastages SEPARATOR '*') INTO retval FROM (
					SELECT
						ROUND(IFNULL((sum(warehouses_data.wastages) / (SUM(warehouses_data.issue_balance) + sum(warehouses_data.wastages))) * 100,0),1) AS wastages
					FROM
						locations AS UC
					INNER JOIN warehouses ON UC.pk_id = warehouses.location_id
					INNER JOIN warehouses_data ON warehouses.pk_id = warehouses_data.warehouse_id
					WHERE
						UC.geo_level_id = 6
					AND warehouses.stakeholder_id = in_stk
					AND warehouses_data.reporting_start_date BETWEEN in_start_date AND in_end_date
					AND warehouses_data.issue_balance IS NOT NULL
					AND warehouses_data.item_pack_size_id = in_item
					AND warehouses.status = 1
					AND UC.province_id = in_loc
					GROUP BY warehouses_data.reporting_start_date) A;

			WHEN (in_lvl = 'D') THEN
				SELECT GROUP_CONCAT(A.wastages SEPARATOR '*') INTO retval FROM (
					SELECT
						ROUND(IFNULL((sum(warehouses_data.wastages) / (SUM(warehouses_data.issue_balance) + sum(warehouses_data.wastages))) * 100,0),1) AS wastages
					FROM
						locations AS UC
					INNER JOIN warehouses ON UC.pk_id = warehouses.location_id
					INNER JOIN warehouses_data ON warehouses.pk_id = warehouses_data.warehouse_id
					WHERE
						UC.geo_level_id = 6
					AND warehouses.stakeholder_id = in_stk
					AND warehouses_data.reporting_start_date BETWEEN in_start_date AND in_end_date
					AND warehouses_data.issue_balance IS NOT NULL
					AND warehouses_data.item_pack_size_id = in_item
					AND warehouses.status = 1
					AND UC.district_id = in_loc
					GROUP BY warehouses_data.reporting_start_date) A;

			WHEN (in_lvl = 'T') THEN
				SELECT GROUP_CONCAT(A.wastages SEPARATOR '*') INTO retval FROM (
					SELECT
						ROUND(IFNULL((sum(warehouses_data.wastages) / (SUM(warehouses_data.issue_balance) + sum(warehouses_data.wastages))) * 100,0),1) AS wastages
					FROM
						locations AS UC
					INNER JOIN warehouses ON UC.pk_id = warehouses.location_id
					INNER JOIN locations AS Tehsil ON UC.pk_id = Tehsil.parent_id
					INNER JOIN warehouses_data ON warehouses.pk_id = warehouses_data.warehouse_id
					WHERE
						UC.geo_level_id = 6
					AND warehouses.stakeholder_id = in_stk
					AND warehouses_data.reporting_start_date BETWEEN in_start_date AND in_end_date
					AND warehouses_data.issue_balance IS NOT NULL
					AND warehouses_data.item_pack_size_id = in_item
					AND warehouses.status = 1
					AND Tehsil.pk_id = in_loc
					GROUP BY warehouses_data.reporting_start_date) A;

			WHEN (in_lvl = 'U') THEN
				SELECT GROUP_CONCAT(A.wastages SEPARATOR '*') INTO retval FROM (	
					SELECT
						ROUND(IFNULL((sum(warehouses_data.wastages) / (SUM(warehouses_data.issue_balance) + sum(warehouses_data.wastages))) * 100,0),1) wastages
					FROM
						locations AS UC
					INNER JOIN warehouses ON UC.pk_id = warehouses.location_id
					INNER JOIN warehouses_data ON warehouses.pk_id = warehouses_data.warehouse_id
					WHERE
						UC.geo_level_id = 6
					AND warehouses.stakeholder_id = in_stk
					AND warehouses_data.reporting_start_date BETWEEN in_start_date AND in_end_date
					AND warehouses_data.issue_balance IS NOT NULL
					AND warehouses_data.item_pack_size_id = in_item
					AND warehouses.status = 1
					AND UC.pk_id = in_loc
					GROUP BY warehouses_data.reporting_start_date) A;

	END CASE;

END CASE;

return retval;

END
;;
DELIMITER ;

-- ----------------------------
-- Function structure for REPUpdateCapacity
-- ----------------------------
DROP FUNCTION IF EXISTS `REPUpdateCapacity`;
DELIMITER ;;
CREATE DEFINER=`vlmis`@`%` FUNCTION `REPUpdateCapacity`(in_wh INTEGER) RETURNS int(11)
    READS SQL DATA
    DETERMINISTIC
BEGIN

DECLARE capacity4 DOUBLE;
DECLARE capacity20 DOUBLE;

SELECT
	ROUND(SUM(ccm_models.net_capacity_20), 4),
	ROUND(SUM(ccm_models.net_capacity_4), 4)
	INTO
	capacity20, capacity4
FROM
	cold_chain
INNER JOIN ccm_models ON cold_chain.ccm_model_id = ccm_models.pk_id
INNER JOIN ccm_asset_types AS subtype ON cold_chain.ccm_asset_type_id = subtype.pk_id
WHERE
	cold_chain.warehouse_id = in_wh
	AND (
		subtype.parent_id IN(1,3)
		OR subtype.pk_id IN(1,3)
	);

UPDATE warehouse_population
SET warehouse_population.capacity_4degree = capacity4,
 warehouse_population.capacity_20degree = capacity20
WHERE
	warehouse_id = in_wh;

return 1;

END
;;
DELIMITER ;

-- ----------------------------
-- Function structure for REPUpdateCarryForward
-- ----------------------------
DROP FUNCTION IF EXISTS `REPUpdateCarryForward`;
DELIMITER ;;
CREATE DEFINER=`vlmis`@`%` FUNCTION `REPUpdateCarryForward`(in_rpt_date DATE, in_item INTEGER, in_wh INTEGER) RETURNS int(4)
    READS SQL DATA
    DETERMINISTIC
BEGIN

DECLARE OB DOUBLE;
DECLARE preMonthCB DOUBLE;
DECLARE CB DOUBLE;
DECLARE receive DOUBLE;
DECLARE issue DOUBLE;
DECLARE wastages DOUBLE;
DECLARE wID INTEGER;

# Get previous month Closing Balance
SELECT
	warehouses_data.closing_balance INTO preMonthCB
FROM
	warehouses_data
WHERE
	warehouses_data.warehouse_id = in_wh
AND warehouses_data.item_pack_size_id = in_item
AND warehouses_data.reporting_start_date = DATE_ADD(in_rpt_date, INTERVAL -1 MONTH) LIMIT 1;

# Get values of the month passed
SELECT
	warehouses_data.pk_id,
	COALESCE(warehouses_data.opening_balance, NULL, 0),
	COALESCE(warehouses_data.received_balance, NULL, 0),
	COALESCE(warehouses_data.issue_balance, NULL, 0),
	COALESCE(warehouses_data.closing_balance, NULL, 0),
	COALESCE(warehouses_data.wastages, NULL, 0)
INTO wID, OB, receive, issue, CB, wastages
FROM
	warehouses_data
WHERE
	warehouses_data.warehouse_id = in_wh
AND warehouses_data.item_pack_size_id = in_item
AND warehouses_data.reporting_start_date = in_rpt_date LIMIT 1;

SET CB = (preMonthCB + receive) - (issue + wastages);

# Check if no data is entered against that product
IF (wID IS NULL) THEN

	INSERT INTO warehouses_data SET
	`reporting_start_date` = in_rpt_date,	
	`item_pack_size_id` = in_item,
	`warehouse_id` = in_wh,	
	`opening_balance` = preMonthCB,
  `closing_balance` = preMonthCB;

ELSE
	# Run update query
	UPDATE warehouses_data SET
		`opening_balance` = preMonthCB,
		`received_balance` = receive,
		`issue_balance` = issue,
		`closing_balance` = CB,
		`wastages` = wastages
	WHERE
		pk_id = wID;

END IF;

return 1;

END
;;
DELIMITER ;

-- ----------------------------
-- Function structure for REPUpdateData
-- ----------------------------
DROP FUNCTION IF EXISTS `REPUpdateData`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `REPUpdateData`(in_month INTEGER, in_year INTEGER, in_item INTEGER, in_wh INTEGER, in_created_by INTEGER) RETURNS int(11)
    READS SQL DATA
    DETERMINISTIC
BEGIN
 
DECLARE openingb INTEGER;
DECLARE receive INTEGER;
DECLARE issue INTEGER;
DECLARE adjustment INTEGER;
DECLARE closingb INTEGER;
DECLARE lastrecid INTEGER;
DECLARE lastmonth INTEGER;
DECLARE lastyear INTEGER;
DECLARE noofdoses INTEGER;

SELECT  number_of_doses   INTO  noofdoses FROM  item_pack_sizes   WHERE  pk_id = in_item;
-- Calculating Last month and YEAR
SELECT MONTH(DATE_ADD(CONCAT(in_year, '-', in_month, '-01'),INTERVAL -1 MONTH)) into lastmonth from DUAL;

SELECT YEAR(DATE_ADD(CONCAT(in_year, '-', in_month, '-01'),INTERVAL -1 MONTH)) into lastyear from DUAL;
-- Get Closing Balance of Last month
SET openingb = REPgetCBWHData(lastmonth, lastyear, in_item, in_wh) * noofdoses;
-- Get Receive this MONTH
SET receive = REPgetTransWHData(1,in_month, in_year, in_item, in_wh) * noofdoses;
-- Get Issue this MONTH
SET issue = REPgetTransWHData(2,in_month, in_year, in_item, in_wh) * noofdoses;
-- Get Adjustment this month
SET adjustment = REPgetTransWHData(3,in_month, in_year, in_item, in_wh) * noofdoses;
-- Calculating Closing balance
SET closingb = (openingb + receive + adjustment) - issue;
-- Deleting old record
DELETE from  warehouses_data  WHERE  MONTH(reporting_start_date) =in_month and YEAR(reporting_start_date)=in_year  and  item_pack_size_id=in_item and  warehouse_id =in_wh;
-- Inserting new record
INSERT into  warehouses_data  (item_pack_size_id,warehouse_id,opening_balance,received_balance,issue_balance,closing_balance,adjustments,reporting_start_date,created_by,created_date) 
VALUES(in_item,in_wh,openingb,receive,issue,closingb,adjustment,CONCAT(in_year, '-', in_month, '-01'),in_created_by,DATE(NOW()));

return 1;

END
;;
DELIMITER ;

-- ----------------------------
-- Function structure for REPUpdateDataCampaign
-- ----------------------------
DROP FUNCTION IF EXISTS `REPUpdateDataCampaign`;
DELIMITER ;;
CREATE DEFINER=`vlmis`@`%` FUNCTION `REPUpdateDataCampaign`(in_date DATE, in_item INTEGER, in_wh INTEGER, in_created_by INTEGER, in_c_id INTEGER) RETURNS int(11)
    READS SQL DATA
    DETERMINISTIC
BEGIN

DECLARE totalCoverage INTEGER;
DECLARE vialsGiven INTEGER;
DECLARE vialsExpired INTEGER;
DECLARE vialsUsed INTEGER;
DECLARE OB INTEGER;
DECLARE receive INTEGER;
DECLARE issue INTEGER;
DECLARE adjustment INTEGER;
DECLARE CB INTEGER;
DECLARE noOfDoses INTEGER;
DECLARE wastages INTEGER;
DECLARE dossesUsed INTEGER;


SELECT number_of_doses INTO noOfDoses FROM item_pack_sizes WHERE item_id = in_item LIMIT 1;

SELECT
	SUM(campaign_data.total_coverage),
	SUM(campaign_data.vials_given),
	SUM(campaign_data.vials_expired),
	SUM(campaign_data.vials_used)
INTO totalCoverage, vialsGiven, vialsExpired, vialsUsed
FROM
	campaign_data
WHERE
	campaign_data.warehouse_id = in_wh
AND campaign_data.campaign_id = in_c_id
AND campaign_data.item_pack_size_id = in_item
LIMIT 1;


SET OB = 0;
SET receive = vialsGiven * noOfDoses;
SET dossesUsed = vialsUsed * noOfDoses;
SET issue = totalCoverage;
SET wastages = (dossesUsed - totalCoverage) + (vialsExpired * noOfDoses);
#SET adjustment = vialsExpired;
SET CB = (OB + receive) - (dossesUsed + wastages);

-- Calculating Closing balance
# SET closingb = (openingb + receive + adjustment) - issue;
-- Deleting old record
DELETE from warehouses_data WHERE reporting_start_date=in_date and item_pack_size_id=in_item and warehouse_id=in_wh;
-- Inserting new record
-- insert into testing(tmp)values(concat('month=',in_month ,' Year=', in_year ,' Item=', in_item ,' whID=', in_wh ,' Added by=', in_created_by ,' Opening=',openingb,' Rcv=',receive,' Issue=',issue,' Adj=',adjustment,' CB=',closingb));

INSERT into warehouses_data (reporting_start_date,item_pack_size_id,warehouse_id,opening_balance,received_balance,issue_balance,closing_balance,wastages,vials_used,created_by,created_date) 
VALUES(in_date,in_item,in_wh,OB,receive,dossesUsed,CB,wastages,vialsUsed,in_created_by,NOW());

return 1;

END
;;
DELIMITER ;

-- ----------------------------
-- Function structure for REPUpdateRequirement
-- ----------------------------
DROP FUNCTION IF EXISTS `REPUpdateRequirement`;
DELIMITER ;;
CREATE DEFINER=`vlmis`@`%` FUNCTION `REPUpdateRequirement`(in_wh INTEGER) RETURNS int(11)
    READS SQL DATA
    DETERMINISTIC
BEGIN

DECLARE required4 DOUBLE;
DECLARE required20 DOUBLE;
DECLARE warehouseType INTEGER;
DECLARE birthsPerYear INTEGER;
DECLARE WomenCBA INTEGER;
DECLARE itemId INTEGER;
DECLARE tempType INTEGER;
DECLARE exitLoop INTEGER;
DECLARE packVolume DOUBLE;
DECLARE dosePeryear DOUBLE;
DECLARE populationFactor DOUBLE;
DECLARE multiplier DOUBLE;
DECLARE wastagesAllowed DOUBLE;
DECLARE TargetNumber DOUBLE;

#Get Warehouse Type items
DECLARE itemsCursor CURSOR FOR
SELECT
	warehouse_vaccine_storage_types.item_id,
	warehouse_vaccine_storage_types.temperature_type,
	items.pack_volume,
	items.doses_per_year,
	items.target_population_factor,
	items.multiplier,
	items.wastage_rate_allowed
FROM
	warehouse_vaccine_storage_types
INNER JOIN items ON warehouse_vaccine_storage_types.item_id = items.pk_id
WHERE
	warehouse_vaccine_storage_types.warehouse_type_id = getWarehouseType(in_wh)
AND items.item_category_id = 1;

DECLARE CONTINUE HANDLER FOR NOT FOUND SET exitLoop = 1;

SELECT
	warehouse_population.live_births_per_year INTO birthsPerYear
FROM
	warehouse_population
WHERE
	warehouse_population.warehouse_id = in_wh;

SELECT
	warehouse_population.women_of_child_bearing_age INTO WomenCBA
FROM
	warehouse_population
WHERE
	warehouse_population.warehouse_id = in_wh;


SET required4 = 0;
SET required20 = 0;

OPEN itemsCursor;
	itemsLoop: LOOP
		FETCH itemsCursor INTO itemId, tempType, packVolume, dosePeryear, populationFactor, multiplier, wastagesAllowed;
	 
			-- check if the exit_loop flag has been set by mysql, 
			-- if it has been set we close the cursor and exit 
			-- the loop
			IF exitLoop THEN
					CLOSE itemsCursor;
					LEAVE itemsLoop;
			END IF;

				CASE 
				WHEN (itemId = 11) THEN
					SET TargetNumber=WomenCBA;
				ELSE
					SET TargetNumber=birthsPerYear;
				END CASE;


			IF(tempType = 20) THEN
				SET required20 = required20 + ((multiplier * TargetNumber / 100) * dosePeryear * packVolume * (1 / (1-(wastagesAllowed / 100))) / 1000 / 12);
			ELSE 
				SET required4 = required4 + ((multiplier * TargetNumber / 100) * dosePeryear * packVolume * (1 / (1-(wastagesAllowed / 100))) / 1000 / 12);
			END IF;			
	 
	END LOOP itemsLoop;

	UPDATE warehouse_population SET requirments_4degree = required4, requirments_20degree = required20 WHERE warehouse_id = in_wh;

return 1;

END
;;
DELIMITER ;

-- ----------------------------
-- Function structure for UTILgetLimitParam
-- ----------------------------
DROP FUNCTION IF EXISTS `UTILgetLimitParam`;
DELIMITER ;;
CREATE DEFINER=`vlmis`@`%` FUNCTION `UTILgetLimitParam`(`in_month` int,`in_year` int) RETURNS int(11)
    DETERMINISTIC
BEGIN 
  DECLARE retval INTEGER;  
  DECLARE start_date VARCHAR(20);  

  SELECT  system.start_date into start_date from system where pk_id = 1;
  SET retval = PERIOD_DIFF(CONCAT(in_year, LPAD(in_month,2,'0')),start_date) + 1;

  RETURN(retval);  
 END
;;
DELIMITER ;
DROP TRIGGER IF EXISTS `Add Placements`;
DELIMITER ;;
CREATE TRIGGER `Add Placements` AFTER INSERT ON `placements` FOR EACH ROW BEGIN
    CALL PlacementSummary(NEW.placement_location_id,NEW.stock_batch_id);
END
;;
DELIMITER ;
DROP TRIGGER IF EXISTS `Update Placements`;
DELIMITER ;;
CREATE TRIGGER `Update Placements` AFTER UPDATE ON `placements` FOR EACH ROW BEGIN
        CALL PlacementSummary(NEW.placement_location_id,NEW.stock_batch_id);
END
;;
DELIMITER ;
DROP TRIGGER IF EXISTS `Delete Placements`;
DELIMITER ;;
CREATE TRIGGER `Delete Placements` AFTER DELETE ON `placements` FOR EACH ROW BEGIN
    CALL PlacementSummary(OLD.placement_location_id,OLD.stock_batch_id);
END
;;
DELIMITER ;
DROP TRIGGER IF EXISTS `Add Stock Batch`;
DELIMITER ;;
CREATE TRIGGER `Add Stock Batch` AFTER INSERT ON `stock_batch` FOR EACH ROW BEGIN
    CALL REPStockBatchHistory(NEW.pk_id, 1);
END
;;
DELIMITER ;
DROP TRIGGER IF EXISTS `Update Stock Batch`;
DELIMITER ;;
CREATE TRIGGER `Update Stock Batch` AFTER UPDATE ON `stock_batch` FOR EACH ROW BEGIN
    IF (NEW.number != OLD.number OR NEW.batch_master_id != OLD.batch_master_id OR NEW.expiry_date != OLD.expiry_date OR NEW.unit_price != OLD.unit_price OR NEW.production_date != OLD.production_date OR NEW.item_pack_size_id != OLD.item_pack_size_id OR NEW.vvm_type_id != OLD.vvm_type_id OR NEW.warehouse_id != OLD.warehouse_id OR NEW.stakeholder_item_pack_size_id != OLD.stakeholder_item_pack_size_id) THEN
        CALL REPStockBatchHistory(NEW.pk_id, 2);
    END IF;
END
;;
DELIMITER ;
DROP TRIGGER IF EXISTS `Delete Stock Batch`;
DELIMITER ;;
CREATE TRIGGER `Delete Stock Batch` BEFORE DELETE ON `stock_batch` FOR EACH ROW BEGIN
    CALL REPStockBatchHistory(OLD.pk_id, 3);
END
;;
DELIMITER ;
DROP TRIGGER IF EXISTS `Add Stock Detail`;
DELIMITER ;;
CREATE TRIGGER `Add Stock Detail` AFTER INSERT ON `stock_detail` FOR EACH ROW BEGIN
    CALL REPStockDetailHistory(NEW.pk_id, 1);
END
;;
DELIMITER ;
DROP TRIGGER IF EXISTS `Update Stock Detail`;
DELIMITER ;;
CREATE TRIGGER `Update Stock Detail` AFTER UPDATE ON `stock_detail` FOR EACH ROW BEGIN
    CALL REPStockDetailHistory(NEW.pk_id, 2);
END
;;
DELIMITER ;
DROP TRIGGER IF EXISTS `Delete Stock Detail`;
DELIMITER ;;
CREATE TRIGGER `Delete Stock Detail` BEFORE DELETE ON `stock_detail` FOR EACH ROW BEGIN
    CALL REPStockDetailHistory(OLD.pk_id, 3);
END
;;
DELIMITER ;
DROP TRIGGER IF EXISTS `Adjust Quantity`;
DELIMITER ;;
CREATE TRIGGER `Adjust Quantity` AFTER DELETE ON `stock_detail` FOR EACH ROW BEGIN
    CALL REPAdjustQty(OLD.stock_batch_id);
END
;;
DELIMITER ;
DROP TRIGGER IF EXISTS `Add Stock Master`;
DELIMITER ;;
CREATE TRIGGER `Add Stock Master` AFTER INSERT ON `stock_master` FOR EACH ROW BEGIN
    CALL REPStockMasterHistory(NEW.pk_id, 1);
END
;;
DELIMITER ;
DROP TRIGGER IF EXISTS `Update Stock Master`;
DELIMITER ;;
CREATE TRIGGER `Update Stock Master` AFTER UPDATE ON `stock_master` FOR EACH ROW BEGIN
    CALL REPStockMasterHistory(NEW.pk_id, 2);
END
;;
DELIMITER ;
DROP TRIGGER IF EXISTS `Delete Stock Master`;
DELIMITER ;;
CREATE TRIGGER `Delete Stock Master` BEFORE DELETE ON `stock_master` FOR EACH ROW BEGIN
    CALL REPStockMasterHistory(OLD.pk_id, 3);
END
;;
DELIMITER ;
